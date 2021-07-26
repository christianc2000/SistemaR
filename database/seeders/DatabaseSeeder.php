<?php

namespace Database\Seeders;

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
       //  \App\Models\User::factory(10)->create(); 
        $this->call(Proveedor::class);// llama al seeder proveedor
        $this->call(UnidadMedida::class);// llama al seeder proveedor
        
       $this->call(RoleSeeder::class);// llama al seeder proveedor
        $this->call(UserSeeder::class);// llama al seeder proveedor
    }
}
