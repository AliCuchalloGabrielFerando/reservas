<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string("alta_baja",5);
            $table->string("contraseña",50);
            $table->string("nombre",150);
            $table->string("usuario",150);
            $table->date("fechaR");
            $table->unsignedBigInteger("grupo_id");
            $table->foreign("grupo_id")->references("id")
                ->on("grupo")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("docente_cod")->nullable();
            $table->foreign("docente_cod")->references("cod")
                ->on("docente")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("auxiliar_cod")->nullable();
            $table->foreign("auxiliar_cod")->references("cod")
                ->on("auxiliar")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("jefe_lab_cod")->nullable();
            $table->foreign("jefe_lab_cod")->references("cod")
                ->on("jefe_lab")
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
        Schema::dropIfExists('usuario');
    }
}
