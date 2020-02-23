<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PAttrOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_attr_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mode')->nullable();
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('unit')->nullable();
            $table->string('image')->nullable();
            $table->text('help')->nullable();
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
        Schema::dropIfExists('p_attr_options');
    }
}
