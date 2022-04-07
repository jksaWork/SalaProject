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
            $table->integer('client_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->string('type')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('short_link_code')->nullable();
            $table->string('url')->nullable();
            $table->string('is_available')->nullable();
            $table->string('image')->nullable();
            $table->string('quantity')->nullable();
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
