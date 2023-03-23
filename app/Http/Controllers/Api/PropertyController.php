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
        //$arrayWhere = [
            //['title', 'Like', '%' . $params['title'] . '%'],
        //];
        //if ($params['min_beds']) { array_push($arrayWhere,  ['n_beds', '>=', $params['min_beds']]); };
        //if ($params['max_beds']) { array_push($arrayWhere,  ['n_beds', '<=', $params['max_beds']]); };
        
        $properties = Property::with('services', 'sponsorships', 'images', 'user', 'views')
                    ->get();

        return response()->json([
            'success' => true,
            'parmas' => $params,
            'results' => $properties
        ]);
    }
}
