<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    /**
     * It will make all fields fillable in model.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'rates' => 'array'
    ];

}
