<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PAttrColorDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_attr_color_details', function (Blueprint $table) {
            $table->id();
            $table->integer('color');
            $table->integer('price')->nullable();
            $table->integer('ordered')->nullable();
            $table->integer('product')->nullable();
            $table->string('image')->nullable();
            $table->boolean('existing')->default(false);
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
        Schema::dropIfExists('p_attr_color_details');
    }
}
