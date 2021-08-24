<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([    #id = 1
            'nombre'=>'Proceso'
        ]);
        Estado::create([    #id = 2
            'nombre'=>'Aceptado'
        ]);
        Estado::create([    #id = 3
            'nombre'=>'Cancelado'
        ]);
        Estado::create([    #id = 4
            'nombre'=>'Finalizado'
        ]);
    }
}
