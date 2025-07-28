<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'serial_number',
        'processor',
        'memory',
        'disk',
        'price',
        'price_string',
    ];
}
