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
    }
}
