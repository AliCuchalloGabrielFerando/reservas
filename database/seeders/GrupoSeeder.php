<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        grupo::create([     #id = 1
            "alta_baja"=>"true",
            "descripcion"=>"Docentes de la FICCT",
            "nombre"=>"Docentes",
            "usuario"=>"miranda",
            "fechaR"=>"2019-07-10"
        ]);

        grupo::create([     #id = 2
            "alta_baja"=>"true",
            "descripcion"=>"JefeLab de la FICCT",
            "nombre"=>"Jefe Laboratorio",
            "usuario"=>"ali",
            "fechaR"=>"2018-05-14"
        ]);
        grupo::create([     #id = 3
            "alta_baja"=>"true",
            "descripcion"=>"Auxiliares de la FICCT",
            "nombre"=>"Auxiliares",
            "usuario"=>"sergio",
            "fechaR"=>"2020-02-01"
        ]);
    }
}
