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
            $table->unsignedBigInteger("lugar_id") ->nullable();
            $table->foreign("lugar_id")->references("id")
                ->on("lugar")
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
