<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\grupom;
class GrupoMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        grupom::create([    #id = 1
            "nombre"=>"SA"
        ]);
        grupom::create([    #id = 2
            "nombre"=>"SB"
        ]);
        grupom::create([    #id = 3
            "nombre"=>"SC"
        ]);
    }
}
