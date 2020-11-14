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
                'address_club' => "Malang",
        'manager_club' => 2
		]);

		\App\Clubs::create([
        'id_user'  => 2,
        'name_club'  => 'Terlena',
        
        'address_club' => "Surabaya",
        'manager_club' => 2
		]);
		\App\Clubs::create([
        'id_user'  => 6,
        'name_club'  => 'Haruna',
        
        'address_club' => "Surabaya",
        'manager_club' => 6
		]);
		\App\Clubs::create([
        'id_user'  => 6,
        'name_club'  => 'Andalusia Loft',
        
        'address_club' => "Malang",
        'manager_club' => 6
		]);
		\App\Clubs::create([
        'id_user'  => 6,
        'name_club'  => 'Yos Loft',
        
        'address_club' => "Malang",
        'manager_club' => 3
		]);
		\App\Clubs::create([
        'id_user'  => 5,
        'name_club'  => 'RG Loft',
        
        'address_club' => "Malang",
        'manager_club' => 5
		]);
		\App\Clubs::create([
        'id_user'  => 4,
        'name_club'  => 'Arjosari Racing Club',
        
        'address_club' => "Malang, Arjosari",
        'manager_club' => 4
		]);
		\App\Clubs::create([
        'id_user'  => 3,
        'name_club'  => 'Manager Owi',
        
        'address_club' => "Malang, Arjosari",
        'manager_club' => 4
		]);
    }
}
