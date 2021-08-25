<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuxiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        auxiliar::create([
            "cod"=>"5",
            "alta_baja"=>"true",
            "ciudad"=>"Santa Cruz de la Sierra",
            "correo"=>"sergio@gmail.com",
            "usuario"=>"sergio",
            "fechaR"=>"2021-07-22",
            "fecha_nacimiento"=>"1998-08-14",
            "codigo_aux"=>"5",
            "registro"=>"217053221",
            "telefono"=>"65857883",
            "numero_formulario"=>"10",
            "cv"=>"100101010",
            "persona_ci"=>"7732152",
            "tipo_auxiliar_id"=>"1"
        ]);
        auxiliar::create([
            "cod"=>"6",
            "alta_baja"=>"true",
            "ciudad"=>"Santa Cruz de la Sierra",
            "correo"=>"mariana@gmail.com",
            "usuario"=>"mariana",
            "fechaR"=>"2021-07-22",
            "fecha_nacimiento"=>"1998-04-12",
            "codigo_aux"=>"10",
            "registro"=>"217021345",
            "telefono"=>"73176619",
            "numero_formulario"=>"20",
            "cv"=>"100101010",
            "persona_ci"=>"8911254",
            "tipo_auxiliar_id"=>"1"
        ]);
    }
}
