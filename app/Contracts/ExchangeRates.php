<?php

namespace App\Contracts;

interface ExchangeRates
{
    /**
     * Download Exchange Rates.
     *
     * @return array
     */
    public function rates();
}
