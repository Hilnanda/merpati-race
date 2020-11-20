<?php

use Illuminate\Database\Seeder;

class LoftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/lofts.sql');
    
        DB::statement($sql);
    }
}
