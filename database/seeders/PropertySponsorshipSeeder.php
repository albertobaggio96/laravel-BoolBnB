<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $property_sponsorship = [
            [
                'property_id' => 2,
                'sposnorship_id' => 3
            ],
            [
                'property_id' => 8,
                'sposnorship_id' => 2
            ],
            [
                'property_id' => 17,
                'sposnorship_id' => 3
            ]
        ];

        foreach ($property_sponsorship as $element) {
            $property=Property::where('id', $element['property_id'])->first();
            $sponsorship=Sponsorship::where('id', $element['sposnorship_id'])->first();
            $property->sponsorships()->attach($sponsorship->id, 
            ['start_date' => date("Y-m-d H:i:s"), 'end_date' => date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s"). ' + '.$sponsorship->period.' hours')) ]);
        }

    }
}
