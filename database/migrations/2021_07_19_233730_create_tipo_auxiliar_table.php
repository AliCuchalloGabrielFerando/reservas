<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoAuxiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_auxiliar', function (Blueprint $table) {
            $table->id();
            $table->string("alta_baja",5);
            $table->string("descripcion",150);
            $table->string("usuario",150);
            $table->bigInteger("carga_horaria");
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
        Schema::dropIfExists('tipo_auxiliar');
    }
}
