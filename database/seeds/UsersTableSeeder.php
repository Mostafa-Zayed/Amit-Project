<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'adminjobfinder@gmail.com',
                'password' => bcrypt('adminjobfinder'),
                'type' => 'admin'
            ],
            [
                'name' => 'Michelle Megan',
                'email' => 'michelle_megan@gmail.com',
                'password' => bcrypt('michelle'),
                'type'=>'normal'
            ],
            [
                'name' => 'Mike Stellar',
                'email' => 'mike_stellar@gmail.com',
                'password' => bcrypt('mike_stellar'),
                'type'=>'normal'
            ],
            [
                'name' => 'Gregg White',
                'email' => 'gregg_white@gmail.com',
                'password' => bcrypt('gregg_white'),
                'type'=>'normal'
            ],
            [
                'name' => 'Rogie Knitt',
                'email' => 'rogie_knitt@gmail.com',
                'password' => bcrypt('rogie_knitt'),
                'type'=>'normal'
            ],
            [
                'name' => 'Ben Koh',
                'email' => 'ben_koh@gmail.com',
                'password' => bcrypt('ben_kohh'),
                'type'=>'normal'
            ],
            [
                'name' => 'Chris Stanworth',
                'email' => 'chris_stanworth@gmail.com',
                'password' => bcrypt('chris_stan'),
                'type'=>'normal'
            ],
            [
                'name' => 'Oly Ahmed',
                'email' => 'oly_ahmed@gmail.com',
                'password' => bcrypt('oly_ahmed'),
                'type'=>'normal'
            ],
            [
                'name' => 'Mohameed Sayed',
                'email' => 'mohameed_sayed@gmail.com',
                'password' => bcrypt('mohameed'),
                'type'=>'normal'
            ],
            [
                'name' => 'Mostafa Zayed',
                'email' => 'mostafa_zayed@gmail.com',
                'password' => bcrypt('mostafaa'),
                'type'=>'normal'
            ],
            [
                'name' => 'Mona Ahmed',
                'email' => 'mona_ahmed@gmail.com',
                'password' => bcrypt('mona_ahmed'),
                'type'=>'normal'
            ]                                                                                               
        ]);
    }
}
