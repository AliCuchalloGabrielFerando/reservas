<?php

namespace Database\Seeders;

use App\Models\gestion_academica;
use Illuminate\Database\Seeder;

class GestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        gestion_academica::create([ #id = 1
            'alta_baja'=>'true',
            'anio'=>'2021',
            'estado'=>'Activo',
            'fechaR'=>'2021-03-05',
            'semestre'=>'1',
            'usuario'=>'rafael'
        ]);
        gestion_academica::create([ #id = 2
            'alta_baja'=>'true',
            'anio'=>'2020',
            'estado'=>'Pasado',
            'fechaR'=>'2020-08-10',
            'semestre'=>'2',
            'usuario'=>'ali'
        ]);
    }
}
