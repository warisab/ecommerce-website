<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_det', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('orders_id');
            $table->unSignedBigInteger('products_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_sales_quantity');
            $table->foreign('orders_id')->references('id')->on('ordersses');
            $table->foreign('products_id')->references('product_id')->on('products');
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
        Schema::dropIfExists('order_det');
    }
}
