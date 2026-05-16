<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('deliveries', function (Blueprint $table) {

        $table->id();

        $table->string('order_id');

        $table->string('courier_name');

        $table->string('courier_company');

        $table->string('customer_name');

        $table->string('customer_phone');

        $table->integer('food_qty')->default(0);

        $table->integer('drink_qty')->default(0);

        $table->text('remarks')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
};
