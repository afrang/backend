<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttrProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mode')->nullable();
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('pricemode')->default(0);
            $table->string('unit')->nullable();
            $table->string('image')->nullable();
            $table->text('help')->nullable();
            $table->boolean('filtered')->default(false);

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
        Schema::dropIfExists('attr_products');
    }
}
