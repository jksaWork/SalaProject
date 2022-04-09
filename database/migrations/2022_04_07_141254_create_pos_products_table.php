<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('botagaty_pos_products', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->string('product_code')->nullable();
            $table->json('name')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_currency')->nullable();
            $table->string('pos_price')->nullable();
            $table->string('available')->nullable();
            $table->string('merchant_id')->nullable();
            $table->json('merchant_name')->nullable();
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
        Schema::dropIfExists('pos_products');
    }
}
