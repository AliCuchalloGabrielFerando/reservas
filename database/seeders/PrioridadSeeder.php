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
        Prioridad::create([
            'nombre'=>'Alta'
        ]);
        Prioridad::create([
            'nombre'=>'Media'
        ]);
        Prioridad::create([
            'nombre'=>'Baja'
        ]);
    }
}
