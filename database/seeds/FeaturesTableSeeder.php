<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('features')->insert([
            ['title'=>'More Jobs Every Day',
             'icon'=>'worker',
             'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.'],
             ['title'=>'Creative Jobs',
             'icon'=>'wrench',
             'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.'],
             ['title'=>'Healthcare',
             'icon'=>'stethoscope',
             'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.'],
             ['title'=>'Finance &amp; Accounting',
             'icon'=>'calculator',
             'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.']
        ]);
    }
}
