<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('urls')->insert([
            'authentication_url' => 'https://prod-52.westeurope.logic.azure.com:443/workflows/6b19ea8852ff441abf02d035ac44e74f/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=oeAX6cxyw3a2SJUQRAnQRrT6Z7jNSr3DPWynsIfebD0',
            'server_url' => 'https://shamal-uat.crm4.dynamics.com/api/data/v9.1/',
            'payment_base_url' => '  https://api-gateway.sandbox.ngenius-payments.com/',
            'api_key' => 'MzU3YjM0ZTktMDc3YS00NjEyLTk5M2MtM2FiNmQ4ZmJlMTMxOjA1OTkxOGQwLWMzOWYtNDlmZi05MWRlLTdkNWM1MDQ5N2M4ZA==',
            'reference_key' => '476646ca-bf21-4d94-b1a9-bbcd4098b6cb',
        ]);
    }
}
