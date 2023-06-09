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
        Schema::create('detail_buyers', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->float('total_price');
            $table->unsignedBigInteger('buyers_id');
            $table->foreign('buyers_id')->references('id')->on('buyers');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->unsignedBigInteger('transactions_id');
            $table->foreign('transactions_id')->references('id')->on('transactions');
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
        Schema::dropIfExists('detail_buyers');
    }
};
