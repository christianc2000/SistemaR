<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Persona;
use App\Models\Trabajador;
use App\Models\User;
use Carbon\Carbon;
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
        // Cargo::create([
        //     'codigo'=>'1111',
        //     'descripcion'=>'administrador',
        //     'sueldo'=>'2500',
        //     'perfil_usuario'=>'1',
        // ]);
        // Persona::create([
        //     'ci'=>'1234567',
        //     'nombre'=>'junior',
        //     'apellido'=>'llanos',
        //     'direccion'=>'plan 3k',
        //     'sexo'=>'M',
        //     'tipo_p'=>'t',
        // ]);
        // Trabajador::create([
        //     'ci_trabajador'=>'1234567',
        //     'fecha_inico'=>Carbon::now(),
        //     'estado'=>'1',
        //     'cod_cargo'=>'1111',
        // ]);

         User::create([
             'name'=>'junior javier llanos',
             'email'=>'juniorjavier@gmail.com',
             'password'=>bcrypt('123456789'),
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
