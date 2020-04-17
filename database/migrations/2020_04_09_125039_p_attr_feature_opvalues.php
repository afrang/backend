<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PAttrFeatureOpvalues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_attr_feature_optvalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent');
            $table->integer('value')->nullable();
            $table->integer('price')->nullable();
            $table->integer('attr')->nullable();

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
        Schema::dropIfExists('p_attr_feature_optvalues');
    }
}
