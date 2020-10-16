<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCustToContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_contact', function (Blueprint $table) {
            $table->longText('customer_contact')->change();
            $table->longText('address_contact')->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_contact', function (Blueprint $table) {
            $table->dropColumn('address_contact');
            $table->dropColumn('customer_contact');
            //
        });
    }
}
