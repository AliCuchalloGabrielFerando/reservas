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
            $table->string("actividad",500);
            $table->date("fecha_inicio");
            $table->date("fecha_fin");

            $table->unsignedBigInteger("estado_id");
            $table->foreign("estado_id")->references("id")
                ->on("estado")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("prioridad_id");
            $table->foreign("prioridad_id")->references("id")
                ->on("prioridad")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("gestion_academica_id");
            $table->foreign("gestion_academica_id")->references("id")
                ->on("gestion_academica")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("materia_grupom_id")->nullable();
            $table->foreign("materia_grupom_id")->references("id")
                ->on("materia_grupom")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("persona_ci");
            $table->foreign("persona_ci")->references("ci")->on("persona")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("jefe_lab_cod") ->nullable();
            $table->foreign("jefe_lab_cod")->references("id")->on("users")
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
