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
        gestion_academica::create([
            'alta_baja'=>'no se',
            'anio'=>'2021',
            'estado'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'semestre'=>'2',
            'usuario'=>'lo que sea'
        ]);
    }
}
