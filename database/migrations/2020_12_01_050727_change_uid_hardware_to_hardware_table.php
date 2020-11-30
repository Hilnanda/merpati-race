<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUidHardwareToHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hardware', function (Blueprint $table) {
            $table->dropUnique(['uid_hardware']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hardware', function (Blueprint $table) {
            $table->string('uid_hardware')->unique()->change();
        });
    }
}
