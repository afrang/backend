<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InoviceInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('parent')->nullable();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('citynumber')->nullable();
            $table->string('fastpostprice')->nullable();
            $table->string('fulladdress')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('postalcode')->nullable();

            $table->integer('postprice')->nullable();
            $table->integer('offpercent')->nullable();
            $table->integer('offweekend')->nullable();
            $table->integer('tax')->nullable();

            $table->string('trackingcode')->nullable();
            $table->string('persiandate')->nullable();
            $table->integer('status')->default(1);
            $table->integer('payment')->default(0);
            $table->string('paymentdate')->nullable();
            $table->string('paymentbank')->nullable();
            $table->text('description')->nullable();
            $table->text('postbarcode')->nullable();
            $table->text('shippingcode')->nullable();
            $table->text('deliverytext')->nullable();
            $table->text('adminmoment')->nullable();

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
        Schema::dropIfExists('invoice_informations');
    }
}
