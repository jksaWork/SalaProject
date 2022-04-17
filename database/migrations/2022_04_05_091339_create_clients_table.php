<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('access_token')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('pos_server_key')->nullable();
            $table->string('pos_secret')->nullable();
            $table->string('pos_email')->nullable();
            $table->string('pos_products_count')->nullable();
            $table->string('password')->nullable();
            $table->string('merchant_id')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
