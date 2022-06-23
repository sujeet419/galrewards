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
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('country_id');
            $table->string('product_name_en');
            $table->string('product_name_fr');
            $table->string('points');
            $table->string('product_thambnail');
            $table->string('product_description_en');
            $table->string('product_description_fr');
            $table->string('product_start_date');
            $table->string('product_end_date');
            $table->integer('special_deals')->nullable(0);
            $table->integer('product_active')->default(0);
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
        Schema::dropIfExists('products');
    }
}
