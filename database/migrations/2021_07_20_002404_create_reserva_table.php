<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->string("alta_baja",10);
            $table->string("actividad",500);
            $table->string("estado",15);
            $table->bigInteger("prioridad");
            $table->date("fecha_inicio_reserva");
            $table->date("fecha_fin_reserva");
            $table->boolean("semanal");

            $table->unsignedBigInteger("gestion_academica_id");
            $table->foreign("gestion_academica_id")->references("id")
                ->on("gestion_academica")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("materia_paralelo_id");
            $table->foreign("materia_paralelo_id")->references("id")
                ->on("materia_paralelo")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("persona_ci") ->nullable();
            $table->foreign("persona_ci")->references("ci")->on("persona")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("docente_cod") ->nullable();
            $table->foreign("docente_cod")->references("cod")->on("docente")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('reserva');
    }
}
