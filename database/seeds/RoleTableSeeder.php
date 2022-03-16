<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Client',
            'slug' => 'client',
        ]);

        DB::table('roles')->insert([
            'name' => 'Chef',
            'slug' => 'chef',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
    }
}
