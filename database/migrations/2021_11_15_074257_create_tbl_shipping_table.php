<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_cname')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_district');
            $table->string('shipping_wards');
            $table->string('shipping_phone');
            $table->text('shipping_notes')->nullable();
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
        Schema::dropIfExists('tbl_shipping');
    }
}
