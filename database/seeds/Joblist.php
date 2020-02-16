<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Joblist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joblists')->insert([
            'name' => 'setting',

        ]);
        DB::table('joblists')->insert([
            'name' => 'firstpage',

        ]);
        DB::table('joblists')->insert([
            'name' => 'articlegroup',

        ]);
        DB::table('joblists')->insert([
            'name' => 'textlist',

        ]);
        DB::table('joblists')->insert([
            'name' => 'editarticle',

        ]);
        DB::table('joblists')->insert([
            'name' => 'users',

        ]);
        DB::table('joblists')->insert([
            'name' => 'post',

        ]);
        DB::table('joblists')->insert([
            'name' => 'gallery',

        ]);
        DB::table('joblists')->insert([
            'name' => 'about',

        ]);
        // For Yuta
        DB::table('joblists')->insert([
            'name' => 'locations',

        ]);
        DB::table('joblists')->insert([
            'name' => 'typebanner',

        ]);
        DB::table('joblists')->insert([
            'name' => 'Attributes',

        ]);
        DB::table('joblists')->insert([
            'name' => 'listourbanners',

        ]);
        DB::table('joblists')->insert([
            'name' => 'listallbanner',

        ]);
        DB::table('joblists')->insert([
            'name' => 'listallbanner',

        ]);

    }
}
