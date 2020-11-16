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
            'id_user' => 3,
            'is_active' => 1
            ]);
        \App\ClubMember::create([
            'id_club' => 5,
            'id_user' => 4,
            'is_active' => 1
            ]);
        \App\ClubMember::create([
            'id_club' => 6,
            'id_user' => 5,
            'is_active' => 1
             ]);
        \App\ClubMember::create([
            'id_club' => 6,
            'id_user' => 6,
            'is_active' => 1
             ]);
        
    }
}
