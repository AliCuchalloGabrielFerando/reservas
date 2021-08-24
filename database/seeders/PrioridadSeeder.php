<?php

namespace Database\Seeders;

use App\Models\Prioridad;
use Illuminate\Database\Seeder;

class PrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prioridad::create([     #id = 1
            'nombre'=>'Alta'
        ]);
        Prioridad::create([     #id = 2
            'nombre'=>'Media'
        ]);
        Prioridad::create([     #id = 3
            'nombre'=>'Baja'
        ]);
    }
}
