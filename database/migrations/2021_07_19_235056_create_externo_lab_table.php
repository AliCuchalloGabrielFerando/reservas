<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternoLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externo_lab', function (Blueprint $table) {
            $table->bigInteger("cod");
            $table->primary("cod");
            $table->string("correo",100);
            $table->unsignedBigInteger("persona_ci");
            $table->foreign("persona_ci")->references("ci")->on("persona")
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
        Schema::dropIfExists('externo_lab');
    }
}
