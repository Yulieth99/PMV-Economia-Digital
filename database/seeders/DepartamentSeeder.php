<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create([
            'name'=> 'Atlantida'
        ]);

        Departament::create([
            'name'=> 'Choluteca'
        ]);

        Departament::create([
            'name'=> 'Colón'
        ]);

        Departament::create([
            'name'=> 'Comayagua'
        ]);

        Departament::create([
            'name'=> 'Copán'
        ]);

        Departament::create([
            'name'=> 'Cortez'
        ]);

        Departament::create([
            'name'=> 'El Paraiso'
        ]);

        Departament::create([
            'name'=> 'Francisco Morazán'
        ]);

        Departament::create([
            'name'=> 'Gracias a Dios'
        ]);

        Departament::create([
            'name'=> 'Intibucá'
        ]);

        Departament::create([
            'name'=> 'Islas de la bahía'
        ]);

        Departament::create([
            'name'=> 'La Paz'
        ]);

        Departament::create([
            'name'=> 'Lempira'
        ]);

        Departament::create([
            'name'=> 'Ocotepeque'
        ]);

        Departament::create([
            'name'=> 'Olancho'
        ]);

        Departament::create([
            'name'=> 'Santa Bárbara'
        ]);

        Departament::create([
            'name'=> 'Valle'
        ]);

        Departament::create([
            'name'=> 'Yoro'
        ]);
    }
}
