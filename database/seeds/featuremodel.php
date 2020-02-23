<?php

use Illuminate\Database\Seeder;

class featuremodel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature_models')->insert([
            'name'=>'text',
        ]);
        DB::table('feature_models')->insert([
            'name'=>'number',
        ]);
        DB::table('feature_models')->insert([
            'name'=>'boolean',
        ]);
        DB::table('feature_models')->insert([
            'name'=>'options',
        ]);
    }
}
