<?php

use Illuminate\Database\Seeder;

class invoive_post_default extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_post_prices')->insert([
            'minfreepost'=>0,
            'postprice'=>0,
            'taxpercent'=>0,
            'offweekend'=>0,
            'offpercent'=>0,
            'fastpostprice'=>0,
        ]);
    }
}
