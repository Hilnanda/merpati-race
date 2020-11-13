<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUidPigeonToPigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pigeons', function (Blueprint $table) {
            $table->string('uid_pigeon')->nullable()->change();
            $table->decimal('ring_size_pigeon')->nullable()->change();
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
            $table->string('uid_pigeon')->change();
            $table->decimal('ring_size_pigeon')->change();
        });
    }
}
