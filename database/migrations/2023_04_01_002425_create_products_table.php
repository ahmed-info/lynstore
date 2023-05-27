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
            $table->string('title_en'); //
            $table->string('title_ar');//
            $table->longText('description_en')->nullable();//
            $table->longText('description_ar')->nullable();
            $table->string('image1')->nullable();// image
            $table->string('image2')->nullable();// image
            $table->string('image3')->nullable();// image
            $table->string('image4')->nullable();// image
            $table->string('image5')->nullable();// image
            //$table->integer('brand_id')->nullable();//
            $table->unsignedBigInteger('brand_id');//

            $table->string('market')->nullable();//////
            $table->string('capacity')->nullable();//
            $table->string('unit')->nullable();//
            $table->integer('quantity')->nullable();//
            $table->integer('salesCounter')->nullable()->default(0);//
            $table->boolean('showIsHome')->nullable()->default(true);// show is home
            $table->boolean('isBestSeller')->nullable();////
            $table->boolean('selectForYou')->nullable()->default(false);// select for you
            $table->boolean('activeOrNot')->nullable();
            $table->integer('supplier_id')->nullable();//
            $table->string('deliveryTime')->nullable();//
            $table->string('sku')->nullable();//
            $table->string('barcode')->nullable();//
            $table->decimal('mainPrice',8,2)->nullable();//
            $table->decimal('mainPriceDiscount',8,2)->nullable();//
            $table->string('originCountry')->nullable();
            $table->unsignedBigInteger('category_id');//
            $table->foreign('category_id')->references('id')->on('categories');//
            $table->foreign('brand_id')->references('id')->on('brands');//
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
