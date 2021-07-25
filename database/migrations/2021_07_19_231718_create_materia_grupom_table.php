<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaGrupomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_grupom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("materia_id");
            $table->foreign("materia_id")->references("id")->on("materia")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger("grupom_id");
            $table->foreign("grupom_id")->references("id")->on("grupom")
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
        Schema::dropIfExists('materia_grupom');
    }
}
