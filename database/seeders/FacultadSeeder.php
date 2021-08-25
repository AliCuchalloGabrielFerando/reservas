<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        facultad::create([  #id = 1
            "nombre"=>"Facultad de Ingenieria en Ciencias de la Computacion y Telecomunicacion",
            "abreviatura"=>"FICTT",
            "codigo"=>"10",
            "universidad_id"=>"1"
        ]);
        facultad::create([  #id = 2
            "nombre"=>"Facultad de Ciencias Exactas y Tecnología",
            "abreviatura"=>"FCET",
            "codigo"=>"20",
            "universidad_id"=>"1"
        ]);
        facultad::create([  #id = 3
            "nombre"=>"Facultad Politécnica",
            "abreviatura"=>"FP",
            "codigo"=>"30",
            "universidad_id"=>"1"
        ]);
    }
}
