<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddressDevliverycities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_delivery_cities', function (Blueprint $table) {
            $table->id();
            $table->integer('city')->nullable();
            $table->boolean('free')->default(0);
            $table->boolean('fastsending')->default(0);
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
        Schema::dropIfExists('address_delivery_cities');
    }
}
