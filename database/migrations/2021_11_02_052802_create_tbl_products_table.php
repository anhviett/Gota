<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->string('content')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->double('base_price');
            $table->double('discount_price')->nullable();
            $table->string('slug')->nullable();
            $table->string('product_views')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
            $table->float('wow_delay', 10)->nullable();
            $table->foreign('category_id')->references('id')->on('tbl_product_categories')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('tbl_colors')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tbl_product_tags')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_products');
    }
}
