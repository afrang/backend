<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class defaultsetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sys_settings')->insert([
            'webname'=>'TissEngine  V2.0',
            'description'=>'Powered By AfrangArt Desing Studio',
            'keywrods'=>'Vue Cli - Laravel Framework - Php 7.3',
            'wellcometext'=>'Well Come to TissEngine',
    ]);
    }
}
