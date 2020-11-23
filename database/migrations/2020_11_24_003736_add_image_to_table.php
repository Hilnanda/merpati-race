<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('country_clubs')->nullable()->after('manager_club');

        });
        Schema::table('events', function (Blueprint $table) {
            $table->string('country_event')->nullable()->after('price_event');

        });
        Schema::table('lofts', function (Blueprint $table) {
            $table->string('country_loft')->nullable()->after('logo_loft');

        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('country_user')->nullable()->after('name_loft');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('country_clubs');

        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('country_event');

        });
        Schema::table('lofts', function (Blueprint $table) {
            $table->dropColumn('country_loft');

        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('country_user');

        });
    }
}
