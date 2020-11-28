<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ClubsTableSeeder::class,
            TeamsTableSeeder::class,
            FootersTableSeeder::class,
            PigeonTableSeeder::class,
            ClubMemberTableSeeder::class,
            LoftsTableSeeder::class,
            LoftMembersTableSeeder::class,
            EventsTableSeeder::class,
            EventHotspotsTableSeeder::class,
            EventParticipantsTableSeeder::class,
            EventResultsTableSeeder::class,
            CountryList::class
        ]);
        
    }
}
