<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('sale_id');
            // $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreignId('product_id');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->foreignId('cat_id')->nullable();
            // $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcat_id')->nullable();
            // $table->foreign('subcat_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->bigInteger('total')->nullable();
            $table->bigInteger('sub_total')->nullable();
            $table->bigInteger('rem_qty')->nullable();
            $table->bigInteger('is_drink')->nullable();
            $table->enum('status', ['pending', 'waiting', 'ready'])->default('pending');
            $table->enum('order_status', ['active', 'inactive', 'hold'])->default('active');
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
        Schema::dropIfExists('sale_details');
    }
}