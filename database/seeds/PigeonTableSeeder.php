<?php

use Illuminate\Database\Seeder;

class PigeonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Pigeons::create([
            'uid_pigeon' => 'BR0001',
            'ring_size_pigeon' => 14,
            'id_user' => 4,
            'id_club' => 5,
            'name_pigeon' => 'Cucak Rowo',
            'sex_pigeon' => 'Jantan',
            'color_pigeon' => 'ANM34',
            'is_active' => 0
            ]);
        \App\Pigeons::create([
            'uid_pigeon' => 'BR0002',
            'ring_size_pigeon' => 8,
            'id_user' => 3,
            'id_club' => 4,
            'name_pigeon' => 'Kacer',
            'sex_pigeon' => 'betina',
            'color_pigeon' => 'BNM12',
            'is_active' => 0
            ]);
        \App\Pigeons::create([
            'uid_pigeon' => 'BR0003',
            'ring_size_pigeon' => 10,
            'id_user' => 3,
            'id_club' => 4,
            'name_pigeon' => 'Jalak Kebo',
            'sex_pigeon' => 'Jantan',
            'color_pigeon' => 'GHI89',
            'is_active' => 1
            ]);
        \App\Pigeons::create([
            'uid_pigeon' => 'BR0004',
            'ring_size_pigeon' => 9,
            'id_user' => 5,
            'id_club' => 6,
            'name_pigeon' => 'Lovebird',
            'sex_pigeon' => 'Betina',
            'color_pigeon' => 'ASD12',
            'is_active' => 1
            ]);
        \App\Pigeons::create([
            'uid_pigeon' => 'BR0005',
            'ring_size_pigeon' => 11,
            'id_user' => 6,
            'id_club' => 6,
            'name_pigeon' => 'Kolibri',
            'sex_pigeon' => 'Jantan',
            'color_pigeon' => 'MKL90',
            'is_active' => 1
            ]);
        \App\Pigeons::create([
            'uid_pigeon' => 'BR0006',
            'ring_size_pigeon' => 14,
            'id_user' => 4,
            'id_club' => 5,
            'name_pigeon' => 'Kenari',
            'sex_pigeon' => 'Jantan',
            'color_pigeon' => 'XDF23',
            'is_active' => 1
            ]);
    }
}
