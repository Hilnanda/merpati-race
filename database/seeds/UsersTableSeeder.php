<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        'username'  => 'admin',
        'name'  => 'admin',
        'email' => 'admin@gmail.com',
        'password'  => bcrypt('admin'),
        'type_user' => 1
		]);

        \App\User::create([
        'username'  => 'user',
        'name'  => 'user',
        'email' => 'user@gmail.com',
        'password'  => bcrypt('user'),
        'type_user' => 2
        ]);

        \App\User::create([
        'username'  => 'sahabul',
        'name'  => 'Sahabul',
        'email' => 'sahabulashfari@gmail.com',
        'password'  => bcrypt('sahabul'),
        'type_user' => 2,
        'is_active' => 1
        ]);

        \App\User::create([
        'username'  => 'owi',
        'name'  => 'Baidhowi',
        'email' => 'baidhowi@gmail.com',
        'password'  => bcrypt('owi'),
        'type_user' => 2,
        'is_active' => 1
        ]);
    }
}
