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
        Estado::create([
            'nombre'=>'Proceso'
        ]);
        Estado::create([
            'nombre'=>'Aceptado'
        ]);
        Estado::create([
            'nombre'=>'Cancelado'
        ]);
        Estado::create([
            'nombre'=>'Finalizado'
        ]);
    }
}
