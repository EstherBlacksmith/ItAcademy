<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
class NuevasTablasYRolUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('users', function (Blueprint $table) {
            $table->enum('rol', ['cliente', 'administrador'])->default('cliente');
        });


        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('planta');
            $table->integer('puerta');            
            $table->float('precio');
            $table->timestamps();
        });


        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('habitacion_id');  
            $table->date('fecha'); 
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
        //
    }
}
 