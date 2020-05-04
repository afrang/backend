<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoicePostPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_post_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('minfreepost')->nullable();
            $table->integer('postprice')->nullable();
            $table->integer('taxpercent')->nullable();
            $table->integer('offweekend')->nullable();
            $table->integer('offpercent')->nullable();
            $table->integer('fastpostprice')->nullable();
            $table->longText('topdesc')->nullable();
            $table->longText('topdesc')->nullable();
            $table->text('morning')->nullable();
            $table->text('afternoom')->nullable();
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
        Schema::dropIfExists('invoice_post_prices');
    }
}
