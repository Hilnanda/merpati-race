<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameLoftToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_loft')->nullable()->after('name');
            $table->double('lat_loft')->nullable()->after('name_loft');
            $table->double('lng_loft')->nullable()->after('lat_loft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name_loft');
            $table->dropColumn('lat_loft');
            $table->dropColumn('lng_loft');
        });
    }
}
