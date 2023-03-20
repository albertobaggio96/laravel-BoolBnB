<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{

    //Function for calcolate the coordinate
    public function getGeocode($address){
        $ext = ".json"; //response format
        //Call TomTom API whit params 
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $address . $ext, [
            "storeResult" => "false",
            "limit" => "1", //limit to first results
            "view" => "Unified",
            "key" => env('KEY_TOMTOM') //personal key (set to .env file)
        ]);
        $jesondata = $response->json();  //convert response in json format
        return $jesondata["results"][0]["position"]; //return array with 2 value, "lat" and "lon"
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $properties = Property::where('user_id', $userId)->get();

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = New Property();
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('admin.properties.create', compact('property', 'services', 'sponsorships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $property
     * @return \Illuminate\Http\Response
     */
    public function store(Request $property)
    {
        $data = $property->validate([
            'title' => 'required|string|min:5|max:100|unique:properties',
            'description' => 'required|string|min:50|max:500',
            'night_price' => 'required|numeric|min:1',
            'n_beds' => 'required|numeric|min:1',
            'n_rooms' => 'required|numeric|min:1',
            'n_toilettes' => 'required|numeric|min:1',
            'cover_img' => 'required|image',
            'mq' => 'required|numeric|min:1',
            'visible' => 'boolean',
            'address' => 'required|string|min:2|max:200',
            'latitude' => 'max:50',
            'longitude' => 'max:50',
            'user_id' => 'exists:users,id',
            'services' => 'required|array|exists:services,id'
        ]);

        $newProperty = new Property();
        $geocode = $this->getGeocode($data['address']);
        $newProperty->user_id = Auth::user()->id;
        $newProperty->fill($data);
        $newProperty->visible=array_key_exists('visible', $data) ? 1 : 0;
        $newProperty->latitude = $geocode["lat"];
        $newProperty->longitude = $geocode["lon"];
        $newProperty->slug = Str::slug($newProperty->title);
        $newProperty->save();
        $newProperty->services()->sync($data['services'] ?? []);
        $newProperty->cover_img = Storage::put('property_img/' . $newProperty->id, $data['cover_img']);
        $newProperty->slug .= "-$newProperty->id";
        $newProperty->update();

        return redirect()->route('admin.properties.show', $newProperty->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        // ?? slider per vedere la proprietà precedente o successiva
        $userId = Auth::user()->id;
        $nextProperty = Property::where('user_id', $userId)->where('title', '>', $property->title)->orderBy('title')->first();
        $prevProperty = Property::where('user_id', $userId)->where('title', '<', $property->title)->orderBy('title', 'DESC')->first();
        $services = Service::all();
        return view('admin.properties.show', compact('property', 'nextProperty', 'prevProperty', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('admin.properties.edit', compact('property', 'services', 'sponsorships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100',  Rule::unique('properties')->ignore($property->id)],
            'description' => 'required|string|min:50|max:500',
            'night_price' => 'required|numeric|min:1',
            'n_beds' => 'required|numeric|min:1',
            'n_rooms' => 'required|numeric|min:1',
            'n_toilettes' => 'required|numeric|min:1',
            'cover_img' => 'image',
            'mq' => 'required|numeric|min:1',
            'visible' => 'boolean',
            'address' => 'required|string|min:2|max:200',
            'latitude' => 'max:50',
            'longitude' => 'max:50',
            'user_id' => 'exists:users,id',
            'services' => 'required|array|exists:services,id'
        ]);

        $property->slug = Str::slug($property->title . "-$property->id");
        $property->services()->sync($data['services'] ?? []);
        $property->visible=array_key_exists('visible', $data) ? 1 : 0;
        $property->update($data);
        return redirect()->route('admin.properties.show', $property->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index');
    }

    /**
     * Display a listing of trash.
     * 
     *
     * @return \Illuminate\Http\Response
     */

     public function trashed(){
        $trashProperties = property::onlyTrashed()->get();
        return view('admin.properties.trashed', compact('trashProperties'));
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */

    public function forceDelete(Property $property){

        Storage::deleteDirectory("property_image/$property->id");

        $property->forceDelete();

        return redirect()->route('admin.properties.trashed')->with('message', "$property->title è stato cancellato definitivamente")->with('alert-type', 'warning');
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */

    public function restore(Property $property){

        $property->restore();

        return redirect()->route('admin.properties.trashed')->with('message', "$property->title è stato ripristinato")->with('alert-type', 'success');
    }

    /**
     * search filter by title
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $userId = Auth::user()->id;
        $first= Property::where('user_id', $userId)->where('title', 'Like', '%' . $request->title . '%');
        $properties= Property::where('user_id', $userId)->where('title', 'Like', $request->title . '%')->union($first)->get();

        return view('admin.properties.index', compact('properties'));
    }
}


