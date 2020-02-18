<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contactus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang');
            $table->string('facbook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('telegramchanal')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();
            $table->string('aparat')->nullable();
            $table->string('soundcloud')->nullable();
            $table->string('twitter')->nullable();
            $table->string('Pinterest')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('phones')->nullable();
            $table->string('googlemap')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('supportphone')->nullable();
            $table->string('qq')->nullable();
            $table->string('tumblr')->nullable();
            $table->string('Baidu')->nullable();
            $table->string('Skype')->nullable();
            $table->string('Viber')->nullable();
            $table->string('SinaWeibo')->nullable();
            $table->string('LINE')->nullable();
            $table->string('vk')->nullable();
            $table->string('Reddit')->nullable();
            $table->string('TikTok')->nullable();
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
        Schema::dropIfExists('contactus');
    }
}
