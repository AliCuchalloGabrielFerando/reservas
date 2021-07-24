<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxiliar', function (Blueprint $table) {
            $table->unsignedBigInteger("cod");
            $table->primary("cod");
            $table->string("alta_baja",5);
            $table->string("ciudad",50);
            $table->string("correo",150);
            $table->string("usuario",150);
            $table->date("fechaR");
            $table->date("fecha_nacimiento");
            $table->bigInteger("codigo_aux");
            $table->bigInteger("registro");
            $table->bigInteger("telefono");
            $table->bigInteger("numero_formulario");
            $table->binary("cv");
            $table->unsignedBigInteger("persona_ci");
            $table->foreign("persona_ci")->references("ci")->on("persona")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("tipo_auxiliar_id");
            $table->foreign("tipo_auxiliar_id")->references("id")->on("tipo_auxiliar")
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
        Schema::dropIfExists('auxiliar');
    }
}
