<?php

use Illuminate\Database\Seeder;

class CountryList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/country_list.sql');
    
        DB::statement($sql);
    }
}
