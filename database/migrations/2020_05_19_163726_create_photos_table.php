<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
        });

        Schema::table('confitures', function (Blueprint $table) {
            $table->bigInteger('id_photo')->unsigned();
            $table->foreign('id_photo')->references('id')->on('photos');
          
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('photos');
        Schema::enableForeignKeyConstraints();
        
    }
}
