<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
             'name'=>'junior javier llanos',
             'email'=>'juniorjavier@gmail.com',
             'password'=>bcrypt('123456789')
         ])->assignRole('Admin');

        // User::factory(9)->create();

         User::create([
             'name'=>'marcelo ',
             'email'=>'marcelo@gmail.com',
             'password'=>bcrypt('123456789')
         ])->assignRole('Cajero');

        User::create([
            'name'=>'mario ',
            'email'=>'mario@gmail.com',
            'password'=>bcrypt('123456789')
        ])->assignRole('Admin');
    }
}
