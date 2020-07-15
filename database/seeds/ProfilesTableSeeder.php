<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profiles')->insert([
            ['user_id'=> 1,
             'permission_id'=> 1,
             'first_name'=>'admin',
             'last_name'=>'admin',
             'job'=>'admin',
             'phone'=>'9888',
             'address'=>'test',
             'city'=>'alex',
             'country'=>'egypt',
             'image'=>'test',
             'postal_code'=>'879',
             'about_me'=>'test',
             'fac_link'=>'test',
             'twt_link'=>'test',
             'goog_link'=>'test',
             //'status'=> 0
            ],            
            ['user_id'=> 2,
            'permission_id'=> 1,
            'first_name'=>'Michelle',
            'last_name'=>'Megan',
            'job'=>'CEO, Co-founder',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'person_1.jpg',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
        ],


            ['user_id'=> 3,
            'permission_id'=> 1,
            'first_name'=>'Mike',
            'last_name'=>'Stellar',
            'job'=>'CEO, Co-founder',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'person_2.jpg',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
        ],


            ['user_id'=> 4,
            'permission_id'=> 1,
            'first_name'=>'Gregg',
            'last_name'=>'White',
            'job'=>'VP Producer',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'person_3.jpg',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
        ],

            ['user_id'=> 5,
            'permission_id'=> 1,
            'first_name'=>'Rogie',
            'last_name'=>'Knitt',
            'job'=>'Project Manager',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'person_4.jpg',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
        ],

            ['user_id'=> 6,
            'permission_id'=> 1,
            'first_name'=>'Ben',
            'last_name'=>'Koh',
            'job'=>'PHP Developer',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'person_1.jpg',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
        ],

            ['user_id'=> 7,
            'permission_id'=> 1,
            'first_name'=>'Chris',
            'last_name'=>'Stanworth',
            'job'=>'Product Designer',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'person_2.jpg',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
        ],

            ['user_id'=> 8,
            'permission_id'=> 1,
            'first_name'=>'Oly',
            'last_name'=>'Ahmed',
            'job'=>'CEO, Co-founder',
            'phone'=>'9888543',
            'address'=>'test address',
            'city'=>'alex',
            'country'=>'egypt',
            'image'=>'test',
            'postal_code'=>'879',
            'about_me'=>'test',
            'fac_link'=>'test',
            'twt_link'=>'test',
            'goog_link'=>'test',
            //'status'=> 0
            ]



        ]);
    }
}
