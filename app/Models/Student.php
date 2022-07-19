<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

    /**
     * Disable timestamps column.
     *
     */
    public $timestamps = false;

    /**
     * It will make all fields fillable in model.
     *
     * @var array
     */
    protected $guarded = [];
}
