<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            ['show'=>1,'add'=>1,'update'=>1,'delete'=>1,'name'=>'admin']
        ]);
    }
}
