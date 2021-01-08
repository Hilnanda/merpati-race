<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staging', function (Blueprint $table) {
            $table->id();
            $table->string('uid_hardware')->nullable();
            $table->string('uid_pigeon')->nullable();
            $table->string('tanggal_hardware')->nullable();
            $table->string('latlong_hardware')->nullable();
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
        Schema::dropIfExists('staging');
    }
}
