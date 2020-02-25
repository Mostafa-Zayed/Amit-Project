<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            ['name'=>'Accounting / Finanace','icon'=>'calculator'],
            ['name'=>'Automotive Jobs','icon'=>'wrench'],
            ['name'=>'Construction / Facilities','icon'=>'worker'],
            ['name'=>'telecommunications','icon'=>'telecommunications'],
            ['name'=>'Healthcare','icon'=>'stethoscope'],
            ['name'=>'Design, Art &amp; Multimedia','icon'=>'computer-graphic'],
            ['name'=>'Transportation &amp; Logistics','icon'=>'trolley'],
            ['name'=>'Restaurant / Food Service','icon'=>'restaurant'],

        ]);
    }
}
