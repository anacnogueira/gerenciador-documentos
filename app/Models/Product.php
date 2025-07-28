<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? number_format($value, 2, ",", ".") : null,
            set: fn ($value) => $value ? str_replace(",", ".", str_replace(".", "", $value)): null
        );
    }

    protected function priceString(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? number_format($value, 2, ",", ".") : null,
            set: fn ($value) => $value ? str_replace(",", ".", str_replace(".", "", $value)): null
        );
    }
}
