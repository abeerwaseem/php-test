<?php
namespace App\Services;

class ExchangeService
{
    protected $gateway;

    public function __construct($gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * Get Exchange rates.
     *
     * @return array
     */
    public function download()
    {
        $exchange_rate = $this->gateway->rates();

        return $exchange_rate;
    }
}
