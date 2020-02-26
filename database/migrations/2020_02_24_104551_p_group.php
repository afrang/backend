<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->integer('sub')->default(0);
            $table->integer('menuitem')->default(1);
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->longText('text')->nullable();
            $table->longText('seotext')->nullable();
            $table->string('icon')->nullable();
            $table->string('thump')->nullable();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('p_groups');
    }
}
