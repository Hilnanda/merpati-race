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
            
            ]);
        \App\Team::create([
            'id_user' => 4,
            'name_team' => 'Team B',
            'desc_team' => 'Team Dari Surabaya',
            
            ]);
        \App\Team::create([
            'id_user' => 2,
            'name_team' => 'Team C',
            'desc_team' => 'Team Dari Banyuwangi',
            
            ]);
    }
}
