<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaAulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_aula', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("dia");
            $table->date("fecha");
            $table->time("hora_inicio");
            $table->time("hora_fin");
            $table->unsignedBigInteger("reserva_id");
            $table->foreign("reserva_id")->references("id")
                ->on("reserva")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("aula_id");
            $table->foreign("aula_id")->references("id")
                ->on("aula")
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
        Schema::dropIfExists('reserva_aula');
    }
}
