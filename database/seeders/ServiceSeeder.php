<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;

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
                'icon' => ''
            ],
            [	//2
                'title' => 'Lavastoviglie',
                'icon' => ''
            ],
            [	//3
                'title' => 'Macchina del ghiaccio',
                'icon' => ''
            ],
            [	//4
                'title' => 'Zona pranzo formale',
                'icon' => ''
            ],
            [	//5
                'title' => 'TV Satellitare',
                'icon' => ''
            ],
            [	//6
                'title' => 'Lettore DVD',
                'icon' => ''
            ],
            [	//7
                'title' => 'Stampante',
                'icon' => ''
            ],
            [	//8
                'title' => 'Caminetto',
                'icon' => ''
            ],
            [	//9
                'title' => 'Wi-Fi',
                'icon' => ''
            ],
            [	//10
                'title' => 'Ascensore',
                'icon' => ''
            ],
            [	//11
                'title' => 'Aria condizionata',
                'icon' => ''
            ],
            [	//12
                'title' => 'Piscina',
                'icon' => ''
            ],
            [	//13
                'title' => 'Sala cinema',
                'icon' => ''
            ],
            [	//14
                'title' => 'Parcheggio',
                'icon' => ''
            ],
            [	//15
                'title' => 'Sala fitness',
                'icon' => ''
            ]
        ];


        foreach($services as $service){
            $newService = new Service();
            $newService->title = $service['title'];
            $newService->icon = $service['icon'];
            $newService->save();
        }
    }
}
