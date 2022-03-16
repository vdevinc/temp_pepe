<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Chef;
use App\Address;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => '',
            'email' => 'admin@pepelechef.com',
            'password' => Hash::make('password4admin'),
            'phone' => '',
            'role_id' => '3' //admin
         ]);

        $user = User::create([
            'first_name' => 'David',
            'last_name' => 'Chef',
            'email' => 'david@pepelechef.com',
            'password' => Hash::make('secret'),
            'phone' => '999999999',
            'role_id' => '2' //chef
         ]);

         $address =  new Address([
            'address_line_1' => '34 Lane, LB Avenue',
            'address_line_2' => '',
            'zip' => '50166',
            'city' => 'Milo',
            'state' => 'Iowa',
            'latitude' => 8.4855,
            'longitude' => 76.94924  
        ]);

        $chef = new Chef(['chef_type_id' => 1, 'school' => 'Cul School']);
        $user->chef()->save($chef);
        $user->address()->save($address);





    }
}
