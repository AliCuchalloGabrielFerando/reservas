<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_academica', function (Blueprint $table) {
            $table->id();
            $table->string("alta_baja",5);
            $table->string("estado",50);
            $table->string("semestre",20);
            $table->string("usuario",150);
            $table->bigInteger("anio");
            $table->date("fechaR");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestion_academica');
    }
}
