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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('link');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->dateTime('expireBanner')->nullable();
            $table->integer('discountPercentage')->nullable();
            $table->integer('discountAmount')->nullable();

            //$table->foreignId('product_id')->constrained('products');

            $table->unsignedBigInteger('product_id')->nullable();//
            $table->foreign('product_id')->references('id')->on('products');//

            $table->unsignedBigInteger('brand_id')->nullable();//
            $table->foreign('brand_id')->references('id')->on('brands');//

            $table->unsignedBigInteger('category_id')->nullable();//
            $table->foreign('category_id')->references('id')->on('categories');//
            //$table->integer('product_id');
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
        Schema::dropIfExists('banners');
    }
};
