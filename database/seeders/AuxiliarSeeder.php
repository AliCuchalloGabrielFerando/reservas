<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\auxiliar;
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
            "cod"=>"1",
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
            "cod"=>"2",
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
        auxiliar::create([
            "cod"=>"3",
            "alta_baja"=>"true",
            "ciudad"=>"La Paz",
            "correo"=>"daniel@gmail.com",
            "usuario"=>"daniel",
            "fechaR"=>"2021-07-22",
            "fecha_nacimiento"=>"1997-02-22",
            "codigo_aux"=>"15",
            "registro"=>"213055268",
            "telefono"=>"68042135",
            "numero_formulario"=>"30",
            "cv"=>"100101010",
            "persona_ci"=>"1020304",
            "tipo_auxiliar_id"=>"1"
        ]);
        auxiliar::create([
            "cod"=>"4",
            "alta_baja"=>"true",
            "ciudad"=>"Oruro",
            "correo"=>"gary@gmail.com",
            "usuario"=>"gary",
            "fechaR"=>"2021-07-22",
            "fecha_nacimiento"=>"1997-02-22",
            "codigo_aux"=>"20",
            "registro"=>"215033952",
            "telefono"=>"76055368",
            "numero_formulario"=>"40",
            "cv"=>"100101010",
            "persona_ci"=>"4456321",
            "tipo_auxiliar_id"=>"1"
        ]);
    }
}
