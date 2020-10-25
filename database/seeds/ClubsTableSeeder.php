<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Clubs::create([
        'id_user'  => 2,
        'name_club'  => 'Bersarang Warrior',
        'lat_club' => -7.773185,
        'lng_club'  => 4.521554,
        'address_club' => "Malang",
        'manager_club' => 2
		]);

		\App\Clubs::create([
        'id_user'  => 2,
        'name_club'  => 'Terlena',
        'lat_club' => -3.0873469,
        'lng_club'  => 2.0893169,
        'address_club' => "Surabaya",
        'manager_club' => 2
		]);
    }
}
