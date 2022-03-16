<?php

use Illuminate\Database\Seeder;

class DishServiceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dish_service_types')->insert([
            'name' => 'Just a Chef',
            'slug' => 'just-a-chef',
            'description' => ''
        ]);

        DB::table('dish_service_types')->insert([
            'name' => 'Chef with Ingredients',
            'slug' => 'chef-with-ingredients',
            'description' => ''
        ]);

        DB::table('dish_service_types')->insert([
            'name' => 'Both',
            'slug' => 'both',
            'description' => ''
        ]);
    }
}
