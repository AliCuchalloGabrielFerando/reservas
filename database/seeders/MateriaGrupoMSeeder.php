<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MateriaGrupoMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        materia_grupom::create([    #id = 1
            "materia_id"=>"1",
            "grupom_id"=>"1",
        ]);
        materia_grupom::create([    #id = 2
            "materia_id"=>"1",
            "grupom_id"=>"2",
        ]);
        materia_grupom::create([    #id = 3
            "materia_id"=>"2",
            "grupom_id"=>"2",
        ]);
        materia_grupom::create([    #id = 4
            "materia_id"=>"2",
            "grupom_id"=>"3",
        ]);
        materia_grupom::create([    #id = 5
            "materia_id"=>"3",
            "grupom_id"=>"1",
        ]);
        materia_grupom::create([    #id = 6
            "materia_id"=>"3",
            "grupom_id"=>"3",
        ]);
        materia_grupom::create([    #id = 7
            "materia_id"=>"4",
            "grupom_id"=>"2",
        ]);
        materia_grupom::create([    #id = 8
            "materia_id"=>"5",
            "grupom_id"=>"1",
        ]);
        materia_grupom::create([    #id = 9
            "materia_id"=>"5",
            "grupom_id"=>"2",
        ]);
        materia_grupom::create([    #id = 10
            "materia_id"=>"6",
            "grupom_id"=>"3",
        ]);
        materia_grupom::create([    #id = 11
            "materia_id"=>"7",
            "grupom_id"=>"1",
        ]);
        materia_grupom::create([    #id = 12
            "materia_id"=>"7",
            "grupom_id"=>"3",
        ]);
        materia_grupom::create([    #id = 13
            "materia_id"=>"8",
            "grupom_id"=>"1",
        ]);
        materia_grupom::create([    #id = 14
            "materia_id"=>"8",
            "grupom_id"=>"3",
        ]);
    }
}
