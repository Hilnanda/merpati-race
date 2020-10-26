<?php

use Illuminate\Database\Seeder;

class FootersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CMSFooter::create([
            'name_copyright' => 'Copyright © 2020, Simetris IT. All Rights Reserved.',
            ]);
    }
}
