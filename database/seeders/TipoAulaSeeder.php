<?php

namespace Database\Seeders;

use App\Models\tipo_aula;
use Illuminate\Database\Seeder;

class TipoAulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_aula::create([     #id = 1
            'nombre'=>'Laboratorio'
        ]);
        tipo_aula::create([     #id = 2
            'nombre'=>'Normal'
        ]);
        tipo_aula::create([     #id = 3
            'nombre'=>'Sala de cómputo'
        ]);
    }
}
