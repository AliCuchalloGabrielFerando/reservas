<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos_software', function (Blueprint $table) {
            $table->id();
            $table->date("fecha_actualizacion");
            $table->unsignedBigInteger("aula_id") ->nullable();
            $table->foreign("aula_id")->references("id")
                ->on("aula")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("software_version_id");
            $table->foreign("software_version_id")->references("id")
                ->on("software_version")
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
        Schema::dropIfExists('requisitos_software');
    }
}
