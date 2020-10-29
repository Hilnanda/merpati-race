<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('logo_event')->nullable()->after('name_event');
            $table->string('category_event')->after('info_event');
            $table->timestamp('due_join_date_event')->nullable()->after('release_time_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('logo_event');
            $table->dropColumn('category_event');
            $table->dropColumn('due_join_date_event');
        });
    }
}
