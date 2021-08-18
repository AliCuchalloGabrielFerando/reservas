<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJefeLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jefe_lab', function (Blueprint $table) {
            $table->unsignedBigInteger("cod");
            $table->primary("cod");

            $table->string("correo",100);
            $table->bigInteger("telefono");
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
        Schema::dropIfExists('jefe_lab');
    }
}
