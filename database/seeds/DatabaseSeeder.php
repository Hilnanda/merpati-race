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
            EventsTableSeeder::class,
            TeamsTableSeeder::class,
            FootersTableSeeder::class,
            PigeonTableSeeder::class,
            ClubMemberTableSeeder::class,
        ]);
        
    }
}
