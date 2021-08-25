<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\docente;
class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        docente::create([
            "cod"=>"1",
            "persona_ci"=>"8020406"
        ]);
        docente::create([
            "cod"=>"2",
            "persona_ci"=>"7321546"
        ]);
        docente::create([
            "cod"=>"3",
            "persona_ci"=>"3152001"
        ]);
        docente::create([
            "cod"=>"4",
            "persona_ci"=>"63025145"
        ]);
    }
}
