<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeHasConfitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_has_confiture', function (Blueprint $table) {
            $table->bigInteger('id_commande')->unsigned();
            $table->bigInteger('id_confiture')->unsigned();

            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->foreign('id_confiture')->references('id')->on('confitures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_has_confiture');
    }
}
