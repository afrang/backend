<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->boolean('publish')->default(1);
            $table->longText('text')->nullable();
            $table->longText('title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('tag')->nullable();
            $table->integer('ordered')->nullable();
            $table->integer('group');
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
        Schema::dropIfExists('b_articles');
    }
}
