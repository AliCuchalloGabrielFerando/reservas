<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\modulo;
class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        modulo::create([    #id = 1
            "nro"=>"236",
            "facultad_id"=>"1"
        ]);
        modulo::create([    #id = 2
            "nro"=>"235",
            "facultad_id"=>"2"
        ]);
        modulo::create([    #id = 3
            "nro"=>"222",
            "facultad_id"=>"3"
        ]);
    }
}
