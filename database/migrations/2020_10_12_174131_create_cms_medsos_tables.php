<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsMedsosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_medsos', function (Blueprint $table) {
            $table->id();
            $table->string('name_medsos')->unique();
            $table->string('url_medsos')->unique();
            $table->string('username_medsos')->nullable();
            $table->string('icon_medsos');
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
        Schema::dropIfExists('cms_medsos');
    }
}
