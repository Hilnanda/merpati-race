<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        \App\Events::create([
        'name_event' => 'Race Grobokan',
        'info_event' => 'Balapan burung sendiri',
        'lat_event' => 3.2421321,
        'lng_event' => -7.214213,
        'address_event' => 'Lamongan',
        'release_time_event' => now(),
        'category_event' => 'Individu',
        'price_event' => 200000
		]);
=======
        $sql = file_get_contents(database_path() . '/seeds/events.sql');
    
         DB::statement($sql);
>>>>>>> 86576db325defcc092e10a10958197f538df5ad2
    }
}
