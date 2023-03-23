<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Image;
use App\Models\Property;
use App\Models\Service;
use App\Models\Sponsorship;

class PropertyController extends Controller {
    
    public function index() {
        //$properties = Property::all();
        $properties = Property::with('services', 'sponsorships', 'images', 'user', 'views')->get();
        return response()->json([
            'success' => true,
            'results' => $properties
        ]);
    }


    public function show(Property $property){
        //$property = Property::where('slug', $property->slug)->get(); 
        //$property = Property::with('services', 'sponsorships', 'images', 'user', 'views')->findOrFail($property->id)->get();
        $property = Property::with('services', 'sponsorships', 'images', 'user', 'views')->findOrFail($property->id);
        return response()->json([
            'success' => true,
            'results' => $property
        ]);
    }
}
