<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lofts', function (Blueprint $table) {
            $table->id();
            $table->index('id_user');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name_loft');
            $table->string('logo_event')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('lofts');
    }
}
