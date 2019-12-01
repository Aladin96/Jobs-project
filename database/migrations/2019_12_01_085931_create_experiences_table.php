<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('id_cv');
          $table->text('intitule');
          $table->text('lieu');
          $table->text('date_debut');
          $table->text('date_fin');
          $table->timestamps();
          $table->foreign('id_cv')->references('id')->on('cvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
