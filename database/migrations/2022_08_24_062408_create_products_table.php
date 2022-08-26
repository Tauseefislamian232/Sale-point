<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            // $table->foreignId('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->foreignId('cat_id');
            // $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcat_id');
            // $table->foreign('subcat_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            // $table->string('remaining_quantity')->nullable();
            $table->enum('is_drink', ['0', '1'])->default('0');
            $table->enum('status', ['active', 'inactive'])->default('active');
            // $table->enum('status', ['pending', 'waiting', 'ready'])->default('pending');
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
        Schema::dropIfExists('products');
    }
}