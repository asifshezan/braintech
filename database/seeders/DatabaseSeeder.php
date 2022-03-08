<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Basic;
use App\Models\ContactInformation;
use App\Models\SocialMedia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Basic::create([
            'basic_status' => 1,
        ]);

        ContactInformation::create([
            'cont_status' => 1,
        ]);

        SocialMedia::create([
            'sm_status' => 1,
        ]);
    }
}
