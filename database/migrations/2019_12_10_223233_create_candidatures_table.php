<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_offre');
            $table->unsignedBigInteger('id_candidat');
            $table->Integer('choix');
            $table->timestamps();

            $table->foreign('id_offre')->references('id')->on('offres')->onDelete('cascade');
            $table->foreign('id_candidat')->references('id')->on('candidats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
    }
}
