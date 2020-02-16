<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Useredit2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->string('natioanlcode')->nullable();
           $table->string('lastname')->nullable();
           $table->string('city')->nullable();
           $table->string('phone')->nullable();
           $table->string('fax')->nullable();
           $table->string('address')->nullable();
           $table->string('birthday')->nullable();
           $table->integer('gender')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
