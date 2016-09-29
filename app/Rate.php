<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * string currency
 * float rate
*/
class Rate extends Model
{
    protected $fillable = [
        'currency',
        'rate',
    ];
}
