<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [	//1
                'title' => 'Cucina completamente attrezzata',
                'icon' => 'fa-solid fa-kitchen-set'
            ],
            [	//2
                'title' => 'Lavastoviglie',
                'icon' => 'fa-solid fa-house-tsunami'
            ],
            [	//3
                'title' => 'Macchina del ghiaccio',
                'icon' => 'fa-regular fa-snowflake'
            ],
            [	//4
                'title' => 'Zona pranzo formale',
                'icon' => 'fa-solid fa-utensils'
            ],
            [	//5
                'title' => 'TV Satellitare',
                'icon' => 'fa-solid fa-tv'
            ],
            [	//6
                'title' => 'Lettore DVD',
                'icon' => 'fa-solid fa-compact-disc'
            ],
            [	//7
                'title' => 'Stampante',
                'icon' => 'fa-solid fa-print'
            ],
            [	//8
                'title' => 'Caminetto',
                'icon' => 'fa-solid fa-fire'
            ],
            [	//9
                'title' => 'Wi-Fi',
                'icon' => 'fa-solid fa-wifi'
            ],
            [	//10
                'title' => 'Ascensore',
                'icon' => 'fa-solid fa-elevator'
            ],
            [	//11
                'title' => 'Aria condizionata',
                'icon' => 'fa-solid fa-temperature-arrow-down'
            ],
            [	//12
                'title' => 'Piscina',
                'icon' => 'fa-solid fa-water-ladder'
            ],
            [	//13
                'title' => 'Sala cinema',
                'icon' => 'fa-solid fa-film'
            ],
            [	//14
                'title' => 'Parcheggio',
                'icon' => 'fa-solid fa-square-parking'
            ],
            [	//15
                'title' => 'Sala fitness',
                'icon' => 'fa-solid fa-dumbbell'
            ]
        ];


        foreach($services as $service){
            $newService = new Service();
            $newService->title = $service['title'];
            $newService->slug = Str::slug($newService->title);
            $newService->icon = $service['icon'];
            $newService->save();
            $newService->slug .="-$newService->id";
            $newService->update();
        }
    }
}
