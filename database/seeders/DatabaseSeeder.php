<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UniversidadSeeder::class,
            FacultadSeeder::class,
            ModuloSeeder::class,
            CarreraSeeder::class,
            MateriaSeeder::class,
            GrupoMSeeder::class,
            MateriaGrupoMSeeder::class,
            GestionSeeder::class,
            GrupoSeeder::class,
            PersonaSeeder::class,
            JefeLabSeeder::class,
            DocenteSeeder::class,
            TipoAuxiliarSeeder::class,
            AuxiliarSeeder::class,
            UserSeeder::class,
            TipoAulaSeeder::class,
            AulaSeeder::class,
            EstadoSeeder::class,
            PrioridadSeeder::class,
        ]);
    }
}
