<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PProdcuts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_prodcuts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('url');
            $table->string('title')->nullable();
            $table->string('modelname')->nullable();
            $table->string('model')->nullable();
            $table->longText('help')->nullable();
            $table->longText('review')->nullable();
            $table->longText('description')->nullable();
            $table->longText('morecomment')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('status')->default(1);
            $table->integer('colormode')->default(1);
            $table->boolean('special')->default(0);

            $table->longText('installation')->nullable();
            $table->string('discount')->nullable();
            $table->string('expressdelivery')->nullable();

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
        Schema::dropIfExists('p_prodcuts');
    }
}
