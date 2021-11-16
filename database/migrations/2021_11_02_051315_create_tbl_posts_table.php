<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->text('summary')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->text('meta_desc');
            $table->text('meta_keywords');
            $table->string('slug');
            $table->string('post_views')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
            $table->foreign('category_id')->references('id')->on('tbl_post_categories')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_posts');
    }
}
