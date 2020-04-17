<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             PagesTableSeeder::class,
             LocationsTableSeeder::class,
             SettingsTableSeeder::class,
             TypesTableSeeder::class,
             FeaturesTableSeeder::class,
             CategoriesTableSeeder::class,
             TestimoniesTableSeeder::class,
             ProfilesTableSeeder::class,
             AboutsTableSeeder::class,
             JobsTableSeeder::class,

             ]);
    }
}
