<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pages')->insert([
            ['name' => 'home'],
            ['name' => 'about'],
            ['name' => 'jobs'],
            ['name' => 'categories'],
            ['name' => 'contact'],
            ['name' => 'login'],
            ['name' => 'regirster']
            ]);
    }
}
