<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleKeyTableHabitaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('habitaciones', function (Blueprint $table) {
            $table->unique(['planta', 'puerta']); //constraint unique multi-columns
        });

        Schema::table('reservas', function (Blueprint $table) {
            $table->unique(['habitacion_id', 'fecha']); //constraint unique multi-columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
      