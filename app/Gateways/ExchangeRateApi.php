<?php

namespace App\Gateways;

use App\Contracts\ExchangeRates;
use GuzzleHttp\Client;
use App\Traits\ApiResponser;

Class ExchangeRateApi implements ExchangeRates
{
    use ApiResponser;

    /**
     * Get Exchange rates.
     *
     * @return array
     */
    public function rates()
    {
        $client = new \GuzzleHttp\Client();

        try{
            $response = $client->request('GET', env('CE_URL').'/'.env('CE_BASE_CURRENCY'));

            $rates = json_decode($response->getBody());

            return [
                'status'            =>  true,
                'conversion_rates'  =>  $rates->conversion_rates,
                'base_code'         =>  $rates->base_code
            ];
        }catch (\Exception $e) {
            return [
                'status'            =>  false,
                'message'           =>  $e->getMessage()
            ];
        }
    }
}
