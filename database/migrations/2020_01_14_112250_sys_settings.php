<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SysSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('webname')->nullable();
            $table->string('description')->nullable();
            $table->string('keywrods')->nullable();
            $table->string('lang')->default('fa');
            $table->string('wellcometext')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('register')->default(true);
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
        Schema::dropIfExists('sys_settings');
    }
}
