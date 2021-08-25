<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tipo_auxiliar;
class TipoAuxiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_auxiliar::create([     #id = 1
            "alta_baja"=>"true",
            "descripcion"=>"Auxiliar de Laboratorio",
            "usuario"=>"auxiliar",
            "carga_horaria"=>"10",
            "fechaR"=>"2021-07-22"
        ]);
    }
}
