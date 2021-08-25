<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\persona;
class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        persona::create([
            "ci"=>"8874491",
            "apellidoM"=>"Cuchallo",
            "apellidoP"=>"Ali",
            "nombre"=>"Gabriel"
        ]);
        persona::create([
            "ci"=>"9610222",
            "apellidoM"=>"Justiniano",
            "apellidoP"=>"Taborga",
            "nombre"=>"Rafael"
        ]);
        persona::create([
            "ci"=>"7732152",
            "apellidoM"=>"Ribera",
            "apellidoP"=>"Bueno",
            "nombre"=>"Sergio"
        ]);
        persona::create([
            "ci"=>"7321546",
            "apellidoM"=>"Justiniano",
            "apellidoP"=>"Taborga",
            "nombre"=>"Martin"
        ]);
        persona::create([
            "ci"=>"8911254",
            "apellidoM"=>"Soliz",
            "apellidoP"=>"Hurtado",
            "nombre"=>"Mariana"
        ]);
        persona::create([
            "ci"=>"8020406",
            "apellidoM"=>"Vásquez",
            "apellidoP"=>"Miranda",
            "nombre"=>"Jose"
        ]);
        persona::create([
            "ci"=>"3152001",
            "apellidoM"=>"Veizaga",
            "apellidoP"=>"Balcazar",
            "nombre"=>"Evans"
        ]);
        persona::create([
            "ci"=>"1020304",
            "apellidoM"=>"Mamani",
            "apellidoP"=>"Aguilar",
            "nombre"=>"Daniel"
        ]);
        persona::create([
            "ci"=>"5030211",
            "apellidoM"=>"Pedraza",
            "apellidoP"=>"Sánchez",
            "nombre"=>"Oscar"
        ]);
    }
}
