<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxSetting extends Model
{
    protected $fillable = [
        'food_setpoint',
        'drink_setpoint',
        'door_delay_seconds',
    ];
}