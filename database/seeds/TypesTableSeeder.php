<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            ['name'=>'Freelance',
             'icon'=>'warning'
            ],
            ['name'=>'Full Time','icon'=>'info'],['name'=>'Par Time','icon'=>'danger']
        ]);
    }
}
