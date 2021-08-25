<?php

namespace Database\Seeders;

use App\Models\universidad;
use Illuminate\Database\Seeder;

class UniversidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        universidad::create([   #id = 1
            "nombre"=>"Universidad Autonoma Gabriel René Moreno",
            "abreviatura"=>"UAGRM"
        ]);
        universidad::create([   #id = 2
            "nombre"=>"Universidad Privada de Santa Cruz",
            "abreviatura"=>"UPSA"
        ]);
    }
}
