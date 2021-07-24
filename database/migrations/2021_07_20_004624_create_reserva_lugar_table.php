<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaLugarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_lugar', function (Blueprint $table) {
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
            $table->unsignedBigInteger("lugar_id");
            $table->foreign("lugar_id")->references("id")
                ->on("lugar")
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
        Schema::dropIfExists('reserva_lugar');
    }
}
