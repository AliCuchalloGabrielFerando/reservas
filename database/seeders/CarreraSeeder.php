<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        carrera::create([   #id = 1
            "nombre"=>"Ingenieria en Sistemas",
            "facultad_id"=>"1",
            "sigla"=>"187-4"
        ]);
        carrera::create([   #id = 2
            "nombre"=>"Ingenieria Informatica",
            "facultad_id"=>"1",
            "sigla"=>"187-3"
        ]);
        carrera::create([   #id = 3
            "nombre"=>"Ingenieria en Redes",
            "facultad_id"=>"1",
            "sigla"=>"187-5"
        ]);
    }
}
