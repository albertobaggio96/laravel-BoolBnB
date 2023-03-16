<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'type' => 'Basic',
                'price' => 2.99,
                'period' => 24
            ],
            [
                'type' => 'Standard',
                'price' => 5.99,
                'period' => 72
            ],
            [
                'type' => 'Premium',
                'price' => 9.99,
                'period' => 144
            ],
        ];



        foreach($sponsorships as $sponsorship){
            $newSponsorship = new Sponsorship();
            $newSponsorship->type = $sponsorship['type'];
            $newSponsorship->slug = Str::slug($newSponsorship->type);
            $newSponsorship->price = $sponsorship['price'];
            $newSponsorship->period = $sponsorship['period'];
            $newSponsorship->save();
            $newSponsorship->slug .="-$newSponsorship->id";
            $newSponsorship->update();
        }
    }
}
