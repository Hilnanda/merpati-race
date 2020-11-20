<?php

use Illuminate\Database\Seeder;

class EventParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/event_partisipants.sql');
    
        DB::statement($sql);
    }
}