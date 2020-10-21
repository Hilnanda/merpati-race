<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('info',1000);
            $table->double('lat');
            $table->double('lng');
            $table->string('address');
            $table->time('release_time');
            $table->time('expired_time')->nullable();
            $table->double('price');
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
        Schema::dropIfExists('event_clubs');
    }
}
