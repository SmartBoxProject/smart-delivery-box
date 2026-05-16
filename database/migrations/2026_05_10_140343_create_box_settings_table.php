<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('box_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('food_setpoint', 5, 2)->default(35);
            $table->decimal('drink_setpoint', 5, 2)->default(25);
            $table->unsignedInteger('door_delay_seconds')->default(5);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('box_settings');
    }
};