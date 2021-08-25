<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\jefe_lab;
class JefeLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jefe_lab::create([
            "cod"=>"1",
            "correo"=>"ali@gmail.com",
            "telefono"=>"75362958",
            "persona_ci"=>"8874491"
        ]);
        jefe_lab::create([
            "cod"=>"2",
            "correo"=>"rafael@gmail.com",
            "telefono"=>"76615445",
            "persona_ci"=>"9610222"
        ]);
        jefe_lab::create([
            "cod"=>"3",
            "correo"=>"oscar@gmail.com",
            "telefono"=>"72054123",
            "persona_ci"=>"5030211"
        ]);
        jefe_lab::create([
            "cod"=>"4",
            "correo"=>"fernando@gmail.com",
            "telefono"=>"78059957",
            "persona_ci"=>"8050214"
        ]);
    }
}
