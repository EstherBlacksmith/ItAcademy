<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('plantas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('planta');
        });       
      */
       
        Schema::table('habitaciones', function (Blueprint $table) {
          /*  $table->dropForeign('planta');
            $table->dropForeign('puerta');
 
*/
            /* $table->unsignedBigInteger('puerta_id');*/
                $table->foreign('puerta_id')->references('id')->on('puertas')
                            ->onUpdate('cascade')
                            ->onDelete('cascade');


             /*   $table->unsignedBigInteger('planta_id');*/
                $table->foreign('planta_id')->references('id')->on('plantas')
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     /*   Schema::dropIfExists('plantas');*/
    }
}
