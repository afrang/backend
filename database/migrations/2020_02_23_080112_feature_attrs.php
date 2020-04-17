<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeatureAttrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_attrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mode')->nullable();
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('feature_attrs');
    }
}
