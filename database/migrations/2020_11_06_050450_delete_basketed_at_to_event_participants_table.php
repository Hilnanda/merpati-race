<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteBasketedAtToEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_participants', function (Blueprint $table) {
            $table->dropColumn('basketed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_participants', function (Blueprint $table) {
            $table->timestamp('basketed_at')->nullable()->after('is_core');
        });
    }
}
