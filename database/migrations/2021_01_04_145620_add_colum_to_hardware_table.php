<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hardware', function (Blueprint $table) {
            $table->string('uid_pigeon')->nullable();
            $table->string('tanggal_hardware')->nullable();
            $table->string('longlat_hardware')->nullable();

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
            $table->dropColumn('uid_pigeon');
            $table->dropColumn('tanggal_hardware');
            $table->dropColumn('longlat_hardware');

        });
    }
}
