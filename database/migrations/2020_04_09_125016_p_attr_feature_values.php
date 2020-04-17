<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PAttrFeatureValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_attr_feature_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product');
            $table->string('value')->nullable();
            $table->integer('attr');
            $table->string('options')->nullable();
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
        Schema::dropIfExists('p_attr_feature_values');
    }
}
