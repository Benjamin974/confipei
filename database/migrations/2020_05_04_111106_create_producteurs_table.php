<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producteurs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
          
        });



        Schema::table('confitures', function (Blueprint $table) {
            $table->bigInteger('id_producteur')->unsigned();
            $table->foreign('id_producteur')->references('id')->on('producteurs');
          
        
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

        Schema::dropIfExists('producteurs');

        Schema::enableForeignKeyConstraints();

      


    }
}
