<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbayItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebay_item', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->json('availability');
            $table->json('aspects');
            $table->string('brand');
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->string('condition');
            $table->string('condition_description');
            $table->json('package_details');
            $table->string('ean');
            $table->string('epid');
            $table->json('image_urls');
            $table->json('isbn');
            $table->string('mpn');
            $table->string('upc');
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
        Schema::dropIfExists('ebay_item');
    }
}
