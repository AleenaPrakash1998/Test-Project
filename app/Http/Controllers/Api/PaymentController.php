<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\Url;
use App\Services\NGeniusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    protected $ngeniusService;

    public function __construct(NGeniusService $ngeniusService)
    {
        $this->ngeniusService = $ngeniusService;
    }

    public function processPayment(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'invoice_ids' => 'required|array',
            'invoce_ids.*' => 'required|string',
            'entity_id' => 'nullable|string',
            'redirect_url' => 'required|url',
            'cancel_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $apiKey = null;
        $outletRefId = null;

        if (!empty($request->input('entity_id'))) {
            $entity = Entity::query()
                ->where('entity_id', $request->input('entity_id'))
                ->first();

            if ($entity) {
                $apiKey = $entity->api_key;
                $outletRefId = $entity->reference_key;
            }
        }

        $invoiceIds = $request->input('invoice_ids');
        $totalAmount = 0;

        $transaction = Transaction::create([
            'status' => 'DRAFT',
        ]);

        foreach ($invoiceIds as $id) {
            $invoiceDetails = $this->fetchInvoiceDetails($id);

            Invoice::create([
                'invoice_id' => $id,
                'transaction_id' => $transaction->id,
                'invoice_amount' => $invoiceDetails['value'][0]['lvt_totalamount'],
            ]);

            $totalAmount += $invoiceDetails['value'][0]['lvt_totalamount'];
            /** @var NGeniusService $payment */
        }

        if ($apiKey && $outletRefId) {
            $payment = new NGeniusService($apiKey, $outletRefId);
        } else {
            $payment = app()->make(NGeniusService::class);
        }

        try {
            $redirectUrl = $request->input('redirect_url');
            $cancelUrl = $request->input('cancel_url');
            $order = $payment->initiatePayment($totalAmount, 'AED', $redirectUrl, $cancelUrl);

            if (!isset($order['_embedded']['payment'][0]['orderReference'])) {
                throw new \Exception('Failed to retrieve order reference from payment response.');
            }

            $orderReference = $order['_embedded']['payment'][0]['orderReference'];

            $transaction->update([
                'order_reference' => $orderReference,
            ]);

            return response()->json(['payment_urls' => $order['_links']['payment']['href']]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function callback(Request $request): JsonResponse
    {
        try {
            if (!isset($request['order']['_embedded']['payment'][0]['orderReference']) ||
                !isset($request['order']['_embedded']['payment'][0]['state'])) {
                return response()->json(['error' => 'Invalid request data'], 400);
            }

            $orderReference = $request['order']['_embedded']['payment'][0]['orderReference'];
            $state = $request['order']['_embedded']['payment'][0]['state'];

            $transaction = Transaction::query()->where('order_reference', $orderReference)->first();

            if (!$transaction) {
                return response()->json(['error' => 'Transaction not found'], 404);
            }

            $transaction->status = $state;
            $transaction->save();

            return response()->json(['status' => $transaction->status], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function fetchInvoiceDetails($invoiceId)
    {
        try {
            $url = Cache::remember('auth_token', 3600, function () {
                return URL::query()->first();
            });

            $tokenResponse = Http::post($url->authentication_url);
            $authToken = $tokenResponse->json('access_token');

            $apiUrl = $url->server_url . '/lvt_invoices';

            $fetchXml = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="false">
                       <entity name="lvt_invoice">
                       <attribute name="lvt_name" />
                       <attribute name="lvt_unitrental" />
                       <attribute name="lvt_rentedsoldunit" />
                       <attribute name="lvt_propertyunit" />
                       <attribute name="lvt_customer" />
                       <attribute name="lvt_invoiceid" />
                       <attribute name="lvt_totalamount" />
                       <attribute name="lvt_taxamount" />
                       <attribute name="statuscode" />
                       <attribute name="statecode" />
                       <attribute name="lvt_legalentity" />
                       <attribute name="lvt_invoicedate" />
                       <attribute name="lvt_dueon" />
                       <attribute name="transactioncurrencyid" />
                       <attribute name="lvt_amountinv" />
                       <attribute name="lvt_amount" />
                       <order attribute="lvt_name" descending="false" />
                       <filter type="and">
                      <condition attribute="lvt_invoiceid" operator="eq" uitype="lvt_invoice" value="' . $invoiceId . '" />
                      <condition attribute="statecode" operator="eq" value="0" />
                      </filter>
                     </entity>
                     </fetch>';

            $apiResponse = Http::withToken($authToken)->get($apiUrl, ['fetchXml' => $fetchXml]);

            $invoices = $apiResponse->json();

            if (!empty($invoices)) {
                return $invoices;
            } else {
                Log::error('No invoice details found for invoice ID: ' . $invoiceId);

                return null;
            }
        } catch (\Exception $e) {
            Log::error('Failed to fetch invoice details: ' . $e->getMessage());

            return null;
        }
    }

    public function getPaymentStatus(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'order_reference' => 'required|string|exists:transactions,order_reference',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $orderReference = $request->input('order_reference');
        $payment = app()->make(NGeniusService::class);

        try {
            $statusResponse = $payment->getPaymentStatus($orderReference);
            $state = $statusResponse['_embedded']['payment'][0]['state'];
            $message = $statusResponse['_embedded']['payment'][0]['authResponse']['resultMessage'] ?? null;

            $transaction = Transaction::query()->where('order_reference', $orderReference)->first();

            if (!$transaction) {
                return response()->json(['error' => 'Transaction not found'], 404);
            }

            if ($transaction->status !== $state) {
                $transaction->status = $state;
                $transaction->save();
            }

            return response()->json(['status' => $transaction->status, 'message' => $message], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
}
