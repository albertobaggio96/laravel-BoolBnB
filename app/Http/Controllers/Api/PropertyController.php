<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Image;
use App\Models\Message;
use App\Models\Property;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller {
    //Function for calcolate the coordinate
    public function getGeocode($address){
        $ext = ".json"; //response format
        //Call TomTom API whit params 
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $address . $ext, [
            "storeResult" => "false",
            "limit" => "1", //limit to first results
            "view" => "Unified",
            "key" => env('VITE_KEY_TOMTOM') //personal key (set to .env file)
        ]);
        $jesondata = $response->json();  //convert response in json format
        return $jesondata["results"][0]["position"] ?? false; //return array with 2 value, "lat" and "lon"
    }

    public function distance($lat1, $lon1, $lat2, $lon2) {
        $r = 6371; // raggio medio della Terra in chilometri
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;
        $a = sin($dLat/2) * sin($dLat/2) + cos($lat1) * cos($lat2) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $d = $r * $c;
        return round($d,2);
    }

    public function show(Property $property){
        $property = Property::with('services', 'sponsorships', 'images', 'user', 'views')->findOrFail($property->id);
        return response()->json([
            'success' => true,
            'results' => $property
        ]);
    }

    public function index(Property $property, Request $request){
        $status = true;
        $errorMessage = '';
        $params = $request->query();
        $arrayWhere = [['visible', true ]];
        if (array_key_exists('min_rooms', $params)) { array_push($arrayWhere,  ['n_rooms', '>=', $params['min_rooms']]); };
        if (array_key_exists('min_beds', $params)) { array_push($arrayWhere,  ['n_beds', '>=', $params['min_beds']]); };

        $radius = (array_key_exists('radius', $params) and is_numeric($params['radius'])) ? $params['radius'] : 20;

        $last = Property::with('services', 'sponsorships', 'images', 'user', 'views');

        $first = Property::with('services', 'sponsorships', 'images', 'user', 'views')->whereRelation('sponsorships', 'end_date', '>=', date("Y-m-d H:i:s"));

        $query = $first->union($last);

        if (array_key_exists('services', $params)) { 
            foreach ($params['services'] as $service) {
                $query->whereHas('services', function($query) use ($service) {
                    $query->where('id', $service);
                });
            }
        };
        $properties = $query->where($arrayWhere)->get();
        
        if (array_key_exists('address', $params) and $params['address'] != '') {
            $address = $params['address'];
            $addressCoordinate = $this->getGeocode($address);
            if ($addressCoordinate) {
                $activeProperties = [];
                $inactiveProperties = [];
                foreach ($properties as $key => $property) {
                    $tmp_dist = $this->distance($addressCoordinate['lat'], $addressCoordinate['lon'] , $property->latitude, $property->longitude);
                    if ($tmp_dist <= $radius) {
                        $property['distance'] =  $tmp_dist;
                        $active = false;
                        foreach ($property['sponsorships'] as $key2 => $sponsorship) {
                            if ($sponsorship['pivot']['end_date'] > date("Y-m-d H:i:s")) {
                                $active = true;
                            }
                        }
                        $property['active_sponsorship'] =  $active;
                        if ($active) {
                            array_push($activeProperties, $property);
                        } else {
                            array_push($inactiveProperties, $property);
                        }
                    }
                }

                usort($activeProperties, fn($a, $b) => $a['distance'] - $b['distance']);
                usort($inactiveProperties, fn($a, $b) => $a['distance'] - $b['distance']);
                $validProperties = array_merge($activeProperties, $inactiveProperties);

            } else {
                $status = false;
                $errorMessage .= 'Indirizzo inserito non Valido!';
            }
        } else {
            $status = false;
            $errorMessage .= 'Paramentro Asddress non corretto!';
        }

        if ($status) {
            $response = [
                'success' => $status,
                'parmas' => $params,
                'results' => $validProperties
            ];
        } else {
            $response = [
                'success' => $status,
                'errorMessage' =>  $errorMessage
            ];
        }

        return response()->json($response);
    }

    public function home(Property $property, Request $request){
        $status = true;
        $errorMessage = '';
        $params = $request->query();
        $arrayWhere = [['visible', true ]];
        if (array_key_exists('sponsorship', $params) && $params['sponsorship']==true) { 
            $allProperties = Property::with('services', 'sponsorships', 'images', 'user', 'views')
                                    ->where($arrayWhere);
            $sponsorshipProperties = Property::with('services', 'sponsorships', 'images', 'user', 'views')
                                    ->where($arrayWhere)
                                    ->whereRelation('sponsorships', 'end_date', '>=', date("Y-m-d H:i:s"));
            $tmpProperties = $sponsorshipProperties->union($allProperties)->get();
            $properties = [];
            foreach ($tmpProperties as $key => $property) {
                $active = false;
                foreach ($property['sponsorships'] as $key2 => $sponsorship) {
                    if ($sponsorship['pivot']['end_date'] > date("Y-m-d H:i:s")) {
                        $active = true;
                    }
                }
                $property['active_sponsorship'] =  $active;
                array_push($properties, $property);
            }
        } else {
            $properties = Property::with('services', 'sponsorships', 'images', 'user', 'views')
                                    ->where($arrayWhere)
                                    ->get();
        };

        if ($status) {
            $response = [
                'success' => $status,
                'parmas' => $params,
                'results' => $properties
            ];
        } else {
            $response = [
                'success' => $status,
                'errorMessage' =>  $errorMessage
            ];
        }

        return response()->json($response);
    }
}

