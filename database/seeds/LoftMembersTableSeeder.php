<?php

use Illuminate\Database\Seeder;

class LoftMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/loft_members.sql');
    
        DB::statement($sql);
    }
}
