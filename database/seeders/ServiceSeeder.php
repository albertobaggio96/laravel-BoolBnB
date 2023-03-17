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
                'icon' => '<i class="fa-solid fa-kitchen-set"></i>'
            ],
            [	//2
                'title' => 'Lavastoviglie',
                'icon' => '<i class="fa-solid fa-house-tsunami"></i>'
            ],
            [	//3
                'title' => 'Macchina del ghiaccio',
                'icon' => '<i class="fa-regular fa-snowflake"></i>'
            ],
            [	//4
                'title' => 'Zona pranzo formale',
                'icon' => '<i class="fa-solid fa-utensils"></i>'
            ],
            [	//5
                'title' => 'TV Satellitare',
                'icon' => '<i class="fa-solid fa-tv"></i>'
            ],
            [	//6
                'title' => 'Lettore DVD',
                'icon' => '<i class="fa-solid fa-compact-disc"></i>'
            ],
            [	//7
                'title' => 'Stampante',
                'icon' => '<i class="fa-solid fa-print"></i>'
            ],
            [	//8
                'title' => 'Caminetto',
                'icon' => '<i class="fa-solid fa-fire"></i>'
            ],
            [	//9
                'title' => 'Wi-Fi',
                'icon' => '<i class="fa-solid fa-wifi"></i>'
            ],
            [	//10
                'title' => 'Ascensore',
                'icon' => '<i class="fa-solid fa-elevator"></i>'
            ],
            [	//11
                'title' => 'Aria condizionata',
                'icon' => '<i class="fa-solid fa-temperature-arrow-down"></i>'
            ],
            [	//12
                'title' => 'Piscina',
                'icon' => '<i class="fa-solid fa-water-ladder"></i>'
            ],
            [	//13
                'title' => 'Sala cinema',
                'icon' => ''
            ],
            [	//14
                'title' => 'Parcheggio',
                'icon' => '<i class="fa-solid fa-film"></i>'
            ],
            [	//15
                'title' => 'Sala fitness',
                'icon' => '<i class="fa-solid fa-dumbbell"></i>'
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
