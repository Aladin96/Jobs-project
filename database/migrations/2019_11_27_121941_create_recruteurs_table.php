<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruteurs', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('type');
          $table->string('nom');
          $table->string('logo');
          $table->string('tel');
          $table->string('adresse');
          $table->string('site_web');
          $table->string('password');
          $table->rememberToken();
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
        Schema::dropIfExists('recruteurs');
    }
}
