<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_recruteur');
            $table->boolean('booster')->default(false);
            $table->string('intitule');
            $table->string('type');
            $table->string('domaine');
            $table->string('diplome');
            $table->integer('annee_experience');
            $table->text('description');
            $table->string('lieu_de_travail');
            $table->string('competences');
            $table->string('remuneration');
            $table->string('status');
            $table->string('date_debut');
            $table->string('duree');
            $table->timestamps();

            $table->foreign('id_recruteur')->references('id')->on('recruteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres');
    }
}
