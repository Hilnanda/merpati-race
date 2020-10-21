<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveDefaultValueToPigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pigeons', function (Blueprint $table) {
            $table->boolean('is_active')->after('type_user')->default(false)->change();
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
            $table->boolean('is_active')->after('type_user')->change();
        });
    }
}
