<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            ['title'=>'TestTitle',
             'phone'=>'877575',
             'address'=>'203 Fake St. Mountain View, San Francisco, California, USA',
             'location'=>'test location',
             'email'=>'youremail@test.com',
             'logo_icon'=>'logo.png',
             'link_facebook'=>'testface_link',
             'link_twitter'=>'testtwitter_link',
             'link_instagram'=>'testinstagram_link',
             'link_vimeo'=>'testvimo_link',
             'more_info'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.',
             'header_bg'=>'header.png'
             ]
        ]);
    }
}
