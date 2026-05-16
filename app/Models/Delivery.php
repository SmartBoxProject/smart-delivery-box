<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'order_id',
        'courier_name',
        'courier_company',
        'customer_name',
        'customer_phone',
        'food_qty',
        'drink_qty',
        'remarks',
    ];
}