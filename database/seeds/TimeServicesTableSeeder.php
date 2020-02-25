<?php

use Illuminate\Database\Seeder;

class TimeServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('timeservices')->insert([
            ['service_time'=>'Wednesdays at 6:30PM - 7:30PM'],
            ['service_time'=>'Fridays at Sunset - 7:30PM'],
            ['service_time'=>'Saturdays at 8:00AM - Sunset']
        ]);
    }
}
