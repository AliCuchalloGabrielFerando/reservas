<?php

namespace Database\Seeders;

use App\Models\aula;
use App\Models\tipo_aula;
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
        tipo_aula::create([
            'nombre'=>'cualquiera'
        ]);

        aula::create([
            'alta_baja'=>'nose',
            'capacidad'=>30,
            'codigo_aula'=>41,
            'descripcion_de_ubicacion'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'usuario'=>'tampoco se',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);

        aula::create([
            'alta_baja'=>'nose',
            'capacidad'=>30,
            'codigo_aula'=>42,
            'descripcion_de_ubicacion'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'usuario'=>'tampoco se',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);

        aula::create([
            'alta_baja'=>'nose',
            'capacidad'=>30,
            'codigo_aula'=>43,
            'descripcion_de_ubicacion'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'usuario'=>'tampoco se',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);

        aula::create([
            'alta_baja'=>'nose',
            'capacidad'=>30,
            'codigo_aula'=>44,
            'descripcion_de_ubicacion'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'usuario'=>'tampoco se',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);

        aula::create([
            'alta_baja'=>'nose',
            'capacidad'=>30,
            'codigo_aula'=>45,
            'descripcion_de_ubicacion'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'usuario'=>'tampoco se',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);

        aula::create([
            'alta_baja'=>'nose',
            'capacidad'=>30,
            'codigo_aula'=>46,
            'descripcion_de_ubicacion'=>'lo que sea',
            'fechaR'=>'2020-05-05',
            'usuario'=>'tampoco se',
            'tipo_aula_id'=>1,
            'modulo_id'=>1,
        ]);
    }
}
