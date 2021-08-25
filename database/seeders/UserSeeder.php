<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"Gabriel Fernando Ali Cuchallo",
            'email'=>"ali@gmail.com",
            'password'=>Hash::make("passAli"),
            "alta_baja"=>"true",
            "usuario"=>"ali",
            "fechaR"=>"2001-07-22",
            "grupo_id"=>"2",
            "jefe_lab_cod"=>"1"
        ]);
        User::create([
            'name'=>"Rafael Carlo Taborga Justiniano",
            'email'=>"rafael@gmail.com",
            'password'=>Hash::make("tortuga"),
            "alta_baja"=>"true",
            "usuario"=>"rafael",
            "fechaR"=>"2001-08-01",
            "grupo_id"=>"2",
            "jefe_lab_cod"=>"2"
        ]);
        User::create([
            'name'=>"Jose Miranda Vásquez",
            'email'=>"miranda@gmail.com",
            'password'=>Hash::make("miranda"),
            "alta_baja"=>"true",
            "usuario"=>"miranda",
            "fechaR"=>"2001-10-05",
            "grupo_id"=>"1",
            "docente_cod"=>"3"
        ]);
        User::create([
            'name'=>"Martin Andrés Taborga Justiniano",
            'email'=>"martin@gmail.com",
            'password'=>Hash::make("diablo"),
            "alta_baja"=>"true",
            "usuario"=>"martin",
            "fechaR"=>"2002-01-15",
            "grupo_id"=>"1",
            "jefe_lab_cod"=>"4"
        ]);
        User::create([
            'name'=>"Sergio Iván Bueno Ribera",
            'email'=>"sergio@gmail.com",
            'password'=>Hash::make("bueno"),
            "alta_baja"=>"true",
            "usuario"=>"sergio",
            "fechaR"=>"2003-10-10",
            "grupo_id"=>"3",
            "auxiliar_cod"=>"5"
        ]);
        User::create([
            'name'=>"Mariana Hurtado Soliz",
            'email'=>"mariana@gmail.com",
            'password'=>Hash::make("password"),
            "alta_baja"=>"true",
            "usuario"=>"mariana",
            "fechaR"=>"203-12-10",
            "grupo_id"=>"3",
            "auxiliar_cod"=>"6"
        ]);
    }
}
