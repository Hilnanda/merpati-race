<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdClubToPigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pigeons', function (Blueprint $table) {
            $table->index('id_club');
            $table->foreignId('id_club')->nullable()->after('id_user')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign(['id_club']);
            $table->dropIndex(['id_club']);
            $table->dropColumn('id_club');
        });
    }
}
