<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->string('uid_hardware')->unique();
            $table->index('id_user');
            $table->foreignId('id_user')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->index('id_event');
            $table->foreignId('id_event')->nullable()->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->string('label_hardware')->nullable()->comment('possible values: location, location_end, basketing');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('hardware');
    }
}
