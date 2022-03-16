<?php

use Illuminate\Database\Seeder;

class ChefTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chef_types')->insert([
            'name' => 'Professional Chef',
            'slug' => 'professional-chef',
        ]);

        DB::table('chef_types')->insert([
            'name' => 'Student',
            'slug' => 'student',
        ]);
    }
}
