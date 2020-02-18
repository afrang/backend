<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class contactus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactus')->insert([
            'lang' => 'fa',

        ]);
    }
}
