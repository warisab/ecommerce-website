<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersses', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('customer_id');
            $table->unSignedBigInteger('shipping_id');
            $table->string('order_total');
            $table->foreign('shipping_id')->references('id')->on('shippingsses');
            $table->foreign('customer_id')->references('id')->on('customersses');
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
        Schema::dropIfExists('ordersses');
    }
}
