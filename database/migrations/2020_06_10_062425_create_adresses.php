<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('pays');
            $table->string('ville');
            $table->string('adresse');
            $table->string('code_postal');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('commandes', function (Blueprint $table) {
            $table->bigInteger('id_adresse_livraison')->unsigned();
            $table->bigInteger('id_adresse_facturation')->unsigned();
            $table->foreign('id_adresse_livraison')->references('id')->on('adresses');
            $table->foreign('id_adresse_facturation')->references('id')->on('adresses');
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
        Schema::dropIfExists('adresses');
        schema::enableForeignKeyConstraints();
    }
}
