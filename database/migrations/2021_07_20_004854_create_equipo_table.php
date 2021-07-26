<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("num_for_asignado");
            $table->date("fechaR");
            $table->string("alta_baja",5);
            $table->string("codigo_activo",250);
            $table->string("descripcion",500);
            $table->string("disponibilidad",15);
            $table->string("estado",10);
            $table->string("usuario",150);
            $table->string("prestable",2);
            $table->unsignedBigInteger("aula_id");
            $table->foreign("aula_id")->references("id")
                ->on("aula")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("tipo_id");
            $table->foreign("tipo_id")->references("id")
                ->on("tipo")
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
        Schema::dropIfExists('equipo');
    }
}
