<?php

use Illuminate\Database\Seeder;

class ClubMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\ClubMember::create([
            'id_club' => 4,
            'id_pigeon' => 4,
            'is_active' => 1
            ]);
        \App\ClubMember::create([
            'id_club' => 5,
            'id_pigeon' => 4,
            'is_active' => 1
            ]);
        \App\ClubMember::create([
            'id_club' => 6,
            'id_pigeon' => 1,
            'is_active' => 0
             ]);
        \App\ClubMember::create([
            'id_club' => 3,
            'id_pigeon' => 3,
            'is_active' => 1
             ]);
        \App\ClubMember::create([
            'id_club' => 3,
            'id_pigeon' => 4,
            'is_active' => 1
             ]);
        \App\ClubMember::create([
            'id_club' => 4,
            'id_pigeon' => 6,
            'is_active' => 0
             ]);
    }
}
