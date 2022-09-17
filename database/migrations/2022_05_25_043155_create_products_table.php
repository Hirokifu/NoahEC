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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_jp');
            $table->string('product_name_cn');
            $table->string('product_slug_jp');
            $table->string('product_slug_cn');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_jp')->nullable();
            $table->string('product_tags_cn')->nullable();
            $table->string('product_size_jp')->nullable();
            $table->string('product_size_cn')->nullable();
            $table->string('product_color_jp')->nullable();
            $table->string('product_color_cn')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_jp');
            $table->string('short_descp_cn');
            $table->text('long_descp_jp');
            $table->text('long_descp_cn');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->string('digital_file')->nullable();
            $table->integer('status')->default(0);
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
};
