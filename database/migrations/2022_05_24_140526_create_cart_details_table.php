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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id')->unsigned();
            $table->bigInteger('cart_id')->unsigned();
            $table->double('qty', 12, 2)->default(0);
            $table->double('harga', 12, 2)->default(0);            
            $table->double('subtotal', 12, 2)->default(0);
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('produk_id')->references('id')->on('products');
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
        Schema::dropIfExists('cart_details');
    }
};
