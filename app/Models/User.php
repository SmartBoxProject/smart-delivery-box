<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable
     */

    protected $fillable = [

        'name',

        'email',

        'password',

        'role',

        'vehicle_plate',

        'face_image',

    ];

    /**
     * Hidden
     */

    protected $hidden = [

        'password',

        'remember_token',

    ];

    /**
     * Casts
     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];
}