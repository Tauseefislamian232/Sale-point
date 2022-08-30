<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('customer_id');
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->bigInteger('sub_total')->nullable();
            $table->bigInteger('discount')->nullable();
            $table->bigInteger('total_disc')->nullable();
            $table->bigInteger('charges')->nullable();
            $table->bigInteger('net_total')->nullable();
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
        Schema::dropIfExists('sales');
    }
}