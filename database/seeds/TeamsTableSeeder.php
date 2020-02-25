<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teams')->insert([
            ['profile_id'=>2],
            ['profile_id'=>3],
            ['profile_id'=>4],
            ['profile_id'=>5],
            ['profile_id'=>6],
            ['profile_id'=>7],

            
        ]);
    }
}
