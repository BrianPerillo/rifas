<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRafflesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //$table->float('price', 6, 2);            $table->string('payment_method', 50);
        Schema::create('raffles', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->unsignedBigInteger('price');
            $table->foreign('price')->references('id')->on('prices')->onDelete('cascade');
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
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
        Schema::dropIfExists('raffles');
    }
}
