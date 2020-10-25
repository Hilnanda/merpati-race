<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsApprovedToClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->boolean('is_approved')->after('id_pigeon');
            $table->boolean('is_active')->after('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->dropColumn('is_approved');
            $table->dropColumn('is_active');
        });
    }
}
