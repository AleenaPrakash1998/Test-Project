<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\invoice;
use App\Models\Transaction;
use App\Models\Url;
use App\Services\NGeniusService;
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

    public function processPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'invoice_ids' => 'required|array',
            'invoce_ids.*' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $invoiceIds = $request->input('invoice_ids');
        $totalAmount = 0;

        $transaction = Transaction::create([
            'status' => 'draft',
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

        $payment = app()->make(NGeniusService::class);

        try {
            $order = $payment->initiatePayment($totalAmount, 'AED');

            if (! isset($order['_embedded']['payment'][0]['orderReference'])) {
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

    public function callback(Request $request)
    {
        // Handle the callback from N-Genius
        // You can verify the payment status here and update your records accordingly

        return response()->json(['message' => 'Payment completed successfully.']);
    }

    private function fetchInvoiceDetails($invoiceId)
    {
        try {
            $url = Cache::remember('auth_token', 3600, function () {
                return URL::query()->first();
            });

            $tokenResponse = Http::post($url->authentication_url);
            $authToken = $tokenResponse->json('access_token');

            $apiUrl = $url->server_url.'/lvt_invoices';

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
                      <condition attribute="lvt_invoiceid" operator="eq" uitype="lvt_invoice" value="'.$invoiceId.'" />
                      <condition attribute="statecode" operator="eq" value="0" />
                      </filter>
                     </entity>
                     </fetch>';

            $apiResponse = Http::withToken($authToken)->get($apiUrl, ['fetchXml' => $fetchXml]);

            $invoices = $apiResponse->json();

            if (! empty($invoices)) {
                return $invoices;
            } else {
                Log::error('No invoice details found for invoice ID: '.$invoiceId);

                return null;
            }
        } catch (\Exception $e) {
            Log::error('Failed to fetch invoice details: '.$e->getMessage());

            return null;
        }
    }
}
