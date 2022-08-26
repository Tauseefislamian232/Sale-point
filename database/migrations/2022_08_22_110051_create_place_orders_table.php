<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('product_id');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('image_id')->nullable();
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('cat_id')->nullable();
            // $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total')->nullable();
            $table->string('discount')->nullable();
            $table->string('net_total')->nullable();
            $table->string('remaining_quantity')->nullable();
            $table->foreignId('is_drink')->nullable();
            $table->enum('status', ['pending', 'waiting', 'ready'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_orders');
    }
}