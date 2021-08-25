<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            "cod"=>"3",
            "persona_ci"=>"8020406"
        ]);
        docente::create([
            "cod"=>"4",
            "persona_ci"=>"7321546"
        ]);
    }
}
