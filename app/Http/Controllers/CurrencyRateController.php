<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrencyRate;
use App\Traits\ApiResponser;
use App\Services\ExchangeService;
use App\Gateways\ExchangeRateApi;

class CurrencyRateController extends Controller
{
    use ApiResponser;

    /**
     * Get Latest Currency Exchange Rates.
     *
     * @param  Illuminate\Http\Request $request
     * @return App\Traits\ApiResponser
     */
    public function index(Request $request)
    {
        $currency_rates = CurrencyRate::get()->last();

        return $this->success(null, 200, [
            'rates'         => $currency_rates->rates,
            'last_update'   => $currency_rates->created_at,
            'base_currency' => $currency_rates->base_currency
        ]);
    }

    /**
     * Update Currency Exchange Rates.
     *
     * @param  Illuminate\Http\Request $request
     * @return App\Traits\ApiResponser
     */
    public function update(Request $request)
    {
        $exchange_rate = new ExchangeService(new ExchangeRateApi);
        $rates = $exchange_rate->download();

        if($rates['status'] === false)
            return $this->error('Error');

        $currency_rate = CurrencyRate::create([
            'rates'         =>  $rates['conversion_rates'],
            'base_currency' =>  $rates['base_code']
        ]);

        return $this->success("Currency Updated.", 200);
    }

}
