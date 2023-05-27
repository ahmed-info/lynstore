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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            //$table->decimal('total',10,2);
            $table->longText('address');
            $table->unsignedBigInteger('user_id');//
            $table->foreign('user_id')->references('id')->on('users');//
            $table->string('status')->default("pending");
            //$table->string('payment_method');
            //$table->string('payment_status');
            $table->integer('product_id');//
            $table->integer('quantity');//
            //$table->string('address');//
            $table->string('phone');//
            $table->integer('totalPrice');
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
        Schema::dropIfExists('orders');
    }
};
