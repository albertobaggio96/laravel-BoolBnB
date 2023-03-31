<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PropertySeeder::class,
            ServiceSeeder::class,
            PropertyServiceSeeder::class,
            ImageSeeder::class,
            SponsorshipSeeder::class,
            MessageSeeder::class,
            PropertySponsorshipSeeder::class
        ]);
    }
}
