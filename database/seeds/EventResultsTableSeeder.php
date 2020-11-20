<?php

use Illuminate\Database\Seeder;

class EventResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/event_results.sql');
    
        DB::statement($sql);
    }
}
