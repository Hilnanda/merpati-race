<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoftMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loft_members', function (Blueprint $table) {
            $table->id();
            $table->index('id_loft');
            $table->foreignId('id_loft')->references('id')->on('lofts')->onDelete('cascade')->onUpdate('cascade');
            $table->index('id_pigeon');
            $table->foreignId('id_pigeon')->references('id')->on('pigeons')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_active');
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
        Schema::dropIfExists('loft_members');
    }
}
