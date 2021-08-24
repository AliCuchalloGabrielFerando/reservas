<?php

namespace Database\Seeders;

use App\Models\aula;
use Illuminate\Database\Seeder;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        aula::create([      #id = 1
            'alta_baja'=>'true',
            'capacidad'=>30,
            'codigo_aula'=>41,
            'descripcion_de_ubicacion'=>'Sala 41 de la FICCT',
            'fechaR'=>'2020-05-05',
            'usuario'=>'rafael',
            'tipo_aula_id'=>3,
            'modulo_id'=>1,
        ]);

        aula::create([      #id = 2
            'alta_baja'=>'true',
            'capacidad'=>35,
            'codigo_aula'=>42,
            'descripcion_de_ubicacion'=>'Sala 42 de la FICCT',
            'fechaR'=>'2020-05-05',
            'usuario'=>'rafael',
            'tipo_aula_id'=>3,
            'modulo_id'=>1,
        ]);

        aula::create([      #id = 3
            'alta_baja'=>'true',
            'capacidad'=>50,
            'codigo_aula'=>10,
            'descripcion_de_ubicacion'=>'Aula 10 de la FICCT',
            'fechaR'=>'2020-05-05',
            'usuario'=>'ali',
            'tipo_aula_id'=>2,
            'modulo_id'=>1,
        ]);

        aula::create([      #id = 4
            'alta_baja'=>'true',
            'capacidad'=>60,
            'codigo_aula'=>21,
            'descripcion_de_ubicacion'=>'Aula 21 de la FICCT',
            'fechaR'=>'2020-05-05',
            'usuario'=>'ali',
            'tipo_aula_id'=>2,
            'modulo_id'=>1,
        ]);

        aula::create([      #id = 5
            'alta_baja'=>'true',
            'capacidad'=>40,
            'codigo_aula'=>32,
            'descripcion_de_ubicacion'=>'Aula 32 de la FICCT',
            'fechaR'=>'2020-05-05',
            'usuario'=>'ali',
            'tipo_aula_id'=>2,
            'modulo_id'=>1,
        ]);

        aula::create([      #id = 6
            'alta_baja'=>'true',
            'capacidad'=>30,
            'codigo_aula'=>150,
            'descripcion_de_ubicacion'=>'Aula Lab de la FICCT',
            'fechaR'=>'2020-05-05',
            'usuario'=>'sergio',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);
    }
}
