<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Team::create([
            'id_user' => 3,
            'name_team' => 'Team A',
            'desc_team' => 'Team Dari Malang',
            'is_active'=>0
            ]);
        \App\Team::create([
            'id_user' => 4,
            'name_team' => 'Team B',
            'desc_team' => 'Team Dari Surabaya',
            'is_active'=>0
            ]);
        \App\Team::create([
            'id_user' => 2,
            'name_team' => 'Team C',
            'desc_team' => 'Team Dari Banyuwangi',
            'is_active'=>1
            ]);
        \App\Team::create([
            'id_user' => 2,
            'name_team' => 'Team D',
            'desc_team' => 'Team Dari Bali',
            'is_active'=>1
            ]);
        \App\Team::create([
            'id_user' => 2,
            'name_team' => 'Team E',
            'desc_team' => 'Team Dari Lumajang',
            'is_active'=>1
            ]);
        \App\Team::create([
            'id_user' => 2,
            'name_team' => 'Team F',
            'desc_team' => 'Team Dari Malang',
            'is_active'=>1
            ]);
    }
}
