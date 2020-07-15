<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobs')->insert([
            ['user_id'=> 1,
             'category_id'=> 1,
             'type_id'=> 1,
             'location_id'=>1,
             'title'=> 'Javascript Fullstack Developer',
             'company_name'=> 'Test Company Name Now',
             'describe'=> 'Test Describtion Now',
             'city'=> 'Alex',
             'salary'=> 8000,
             'number_days'=> 50,
             'more_info'=> 'Test More Information Now',
             'image_video'=> 'Test Link Video Or Image Now'

        ],
        ['user_id'=> 1,
        'category_id'=> 2,
        'type_id'=> 2,
        'location_id'=>1,
        'title'=> 'Javascript Fullstack Developer job2',
        'company_name'=> 'Test Company Name Now job 2',
        'describe'=> 'Test Describtion Now job2',
        'city'=> 'Alex job2',
        'salary'=> 8000,
        'number_days'=> 50,
        'more_info'=> 'Test More Information Now',
        'image_video'=> 'Test Link Video Or Image Now'

       ]
        ]);
    }
}
