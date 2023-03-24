<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Image;
use App\Models\Property;
use App\Models\Service;
use App\Models\Sponsorship;

class PropertyController extends Controller {

    public function show(Property $property){
        $property = Property::with('services', 'sponsorships', 'images', 'user', 'views')->findOrFail($property->id);
        return response()->json([
            'success' => true,
            'results' => $property
        ]);
    }

    public function index(Property $property, Request $request){
        $params = $request->query();
        $arrayWhere = [];
        if (array_key_exists('min_rooms', $params)) { array_push($arrayWhere,  ['n_rooms', '>=', $params['min_rooms']]); };
        if (array_key_exists('min_beds', $params)) { array_push($arrayWhere,  ['n_beds', '>=', $params['min_beds']]); };
        
        $query = Property::with('services', 'sponsorships', 'images', 'user', 'views');

        if (array_key_exists('services', $params)) { 
            foreach ($params['services'] as $service) {
                $query->whereHas('services', function($query) use ($service) {
                    $query->where('title', $service);
                });
            }
        };
        $properties = $query->where($arrayWhere)->get();


        return response()->json([
            'success' => true,
            'parmas' => $params,
            'results' => $properties
        ]);
    }
}
