<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        materia::create([       #id = 1
            "nombre"=>"Cálculo I",
            "sigla"=>"MAT-101",
            "creditos"=>"5",
            "nivel"=>"1",
            "carrera_id"=>"1"
        ]);
        materia::create([       #id = 2
            "nombre"=>"Programación I",
            "sigla"=>"INF-100",
            "creditos"=>"5",
            "nivel"=>"2",
            "carrera_id"=>"1"
        ]);
        materia::create([       #id = 3
            "nombre"=>"Programación II",
            "sigla"=>"INF-210",
            "creditos"=>"5",
            "nivel"=>"3",
            "carrera_id"=>"1"
        ]);
        materia::create([       #id = 4
            "nombre"=>"Programación Ensamblador",
            "sigla"=>"INF-221",
            "creditos"=>"5",
            "nivel"=>"4",
            "carrera_id"=>"2"
        ]);
        materia::create([       #id = 5
            "nombre"=>"Estructura de Datos I",
            "sigla"=>"INF-200",
            "creditos"=>"5",
            "nivel"=>"4",
            "carrera_id"=>"2"
        ]);
        materia::create([       #id = 6
            "nombre"=>"Diseño de Circuitos Integrados",
            "sigla"=>"ELC-201",
            "creditos"=>"5",
            "nivel"=>"5",
            "carrera_id"=>"3"
        ]);
        materia::create([       #id = 7
            "nombre"=>"Redes I",
            "sigla"=>"INF-433",
            "creditos"=>"5",
            "nivel"=>"7",
            "carrera_id"=>"3"
        ]);
        materia::create([       #id = 8
            "nombre"=>"Redes II",
            "sigla"=>"INF-433",
            "creditos"=>"5",
            "nivel"=>"8",
            "carrera_id"=>"3"
        ]);
    }
}
