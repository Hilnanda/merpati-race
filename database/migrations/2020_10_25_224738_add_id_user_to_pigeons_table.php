<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToPigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pigeons', function (Blueprint $table) {
            $table->dropForeign(['id_club']);
            $table->dropIndex(['id_club']);
            $table->dropColumn('id_club');
            $table->index('id_user');
            $table->foreignId('id_user')->after('ring_size_pigeon')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pigeons', function (Blueprint $table) {
            $table->index('id_club');
            $table->foreignId('id_club')->references('id')->on('pigeons')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['id_user']);
            $table->dropIndex(['id_user']);
            $table->dropColumn('id_user');
        });
    }
}
