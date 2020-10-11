<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePigeonsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigeons', function (Blueprint $table) {
            $table->id();
            $table->string('uid_pigeon')->unique();
            $table->index('id_club');
            $table->foreignId('id_club')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name_pigeon')->nullable();
            $table->string('sex_pigeon',10)->nullable();
            $table->string('color_pigeon',10)->nullable();
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
        Schema::dropIfExists('pigeons');
    }
}
