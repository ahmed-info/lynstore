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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->string('image');
            $table->integer('brand_id');
            $table->string('market');
            $table->string('capacity');
            $table->string('unit');
            $table->string('packageCount');
            $table->boolean('showIsHome');
            $table->boolean('isBestSeller');
            $table->boolean('selectForYou');
            $table->boolean('activeOrNot');
            $table->integer('supplier_id');
            $table->string('deliveryTime');
            $table->string('sku');
            $table->string('barcode');
            $table->decimal('mainPrice',8,2)->nullable();
            $table->decimal('mainPriceDiscount',8,2)->nullable();
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
};
