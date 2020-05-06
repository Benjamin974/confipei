<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfitureHasFruitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confiture_has_fruit', function (Blueprint $table) {
            $table->bigInteger('id_confiture')->unsigned();
            $table->bigInteger('id_fruit')->unsigned();

            $table->foreign('id_confiture')->references('id')->on('confitures');
            $table->foreign('id_fruit')->references('id')->on('fruits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confiture_has_fruit');
    }
}
