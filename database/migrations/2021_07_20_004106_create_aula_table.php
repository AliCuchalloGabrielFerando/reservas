<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->id();
            $table->string("alta_baja",4);
            $table->string("descripcion_de_ubicacion",500);
            $table->string("usuario",50);
            $table->date("fechaR");
            $table->bigInteger("codigo_aula");
            $table->bigInteger("capacidad");

            $table->unsignedBigInteger("tipo_aula_id");
            $table->foreign("tipo_aula_id")->references("id")
                ->on("tipo_aula")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("modulo_id");
            $table->foreign("modulo_id")->references("id")->on("modulo")
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
        Schema::dropIfExists('aula');
    }
}
