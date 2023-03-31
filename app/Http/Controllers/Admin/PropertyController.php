<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Property;
use App\Models\Service;
use App\Models\Message;
use App\Models\Sponsorship;
use RealRashid\SweetAlert\Facades\Alert;;
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
            "key" => env('VITE_KEY_TOMTOM') //personal key (set to .env file)
        ]);
        $jesondata = $response->json();  //convert response in json format
        return $jesondata["results"][0]["position"] ?? false; //return array with 2 value, "lat" and "lon"
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $properties = Property::with('sponsorships')->where('user_id', $userId)->orderBy('title')->get();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $geocode = $this->getGeocode($request->address);
        if($geocode){
            $request['latitude'] = $geocode["lat"];
            $request['longitude'] = $geocode["lon"];
        } else{
            $request['address'] = null;
        }

        
        $data = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100',  Rule::unique('properties')->where('user_id', Auth::user()->id)],
            'description' => 'required|string|min:50|max:65535',
            'night_price' => 'required|numeric|min:1|max:999999,99',
            'n_beds' => 'required|numeric|min:1|max:127',
            'n_rooms' => 'required|numeric|min:1|max:127',
            'n_toilettes' => 'required|numeric|min:1|max:127',
            'cover_img' => 'required|image',
            'mq' => 'required|numeric|min:1|max:65536',
            'visible' => 'boolean',
            'address' => 'required|string|min:2|max:200',
            'latitude' => 'max:50',
            'longitude' => 'max:50',
            'user_id' => 'exists:users,id',
            'services' => 'required|array|exists:services,id',
            'images' => 'array'
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
        
        if(array_key_exists('images', $data)){
            foreach($data['images'] as $img){
                $newImages = new Image();
                $newImages->property_id = $newProperty->id;
                $newImages->path= Storage::put('property_image/' . $newProperty->id, $img);
                $newImages->save();
            }
        }

        $newProperty->services()->sync($data['services'] ?? []);
        $newProperty->cover_img = Storage::put('property_image/' . $newProperty->id, $data['cover_img']);
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
        $userId = Auth::user()->id;
        if($property->user_id === $userId){

            // ?? slider per vedere la proprietà precedente o successiva
            $nextProperty = Property::where('user_id', $userId)->where('title', '>', $property->title)->orderBy('title')->first();
            $prevProperty = Property::where('user_id', $userId)->where('title', '<', $property->title)->orderBy('title', 'DESC')->first();

            return view('admin.properties.show', compact('property', 'nextProperty', 'prevProperty'));
            
        } else{
            return abort(401);
        }
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
        $geocode = $this->getGeocode($request->address);
        if($geocode){
            $request['latitude'] = $geocode["lat"];
            $request['longitude'] = $geocode["lon"];
        } else{
            $request['address'] = null;
        }
        
        $data = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100',  Rule::unique('properties')->where('user_id', Auth::user()->id)->ignore($property->id)],
            'description' => 'required|string|min:50||max:65535',
            'night_price' => 'required|numeric|min:1|max:999999,99',
            'n_beds' => 'required|numeric|min:1|max:127',
            'n_rooms' => 'required|numeric|min:1|max:127',
            'n_toilettes' => 'required|numeric|min:1|max:127',
            'cover_img' => 'image',
            'mq' => 'required|numeric|min:1|max:65536',
            'visible' => 'boolean',
            'address' => 'required|string|min:2|max:200',
            'latitude' => 'max:50',
            'longitude' => 'max:50',
            'user_id' => 'exists:users,id',
            'services' => 'required|array|exists:services,id',
            'images'=> 'array',
            'images_table' => 'array'
        ]);

        $property->slug = Str::slug($property->title . "-$property->id");
        $property->services()->sync($data['services'] ?? []);
        $property->visible=array_key_exists('visible', $data) ? 1 : 0;

        // if have file it trash it
        if(array_key_exists('cover_img', $data)){
            if($request->hasFile('cover_img')){
                Storage::delete($property->cover_img);
            }
            // update new file
            $data['cover_img']= Storage::put('property_image/' . $property->id, $data['cover_img']);
        }


        // delete unselected img
        $imageTable = Image::where('property_id', $property->id)->get();
        $imageTableID = $imageTable->pluck('id')->toArray();
        if(array_key_exists('images_table', $data)){
            $unselectedImagesID = array_diff($imageTableID, $data['images_table']);
            // from storage
            $unselectedImagesPath = Image::whereIn('id', $unselectedImagesID)->pluck('path')->toArray();
            Storage::delete($unselectedImagesPath);
            // from db
            Image::destroy($unselectedImagesID);
        } else{
            $unselectedImagesPath = Image::where('property_id', $property->id)->pluck('path')->toArray();
            Storage::delete($unselectedImagesPath);
            Image::destroy($imageTableID);
        }
        
        // update multi images table
        if(array_key_exists('images', $data)){
            foreach($data['images'] as $img){
                $newImages = new Image();
                $newImages->property_id = $property->id;
                $newImages->path= Storage::put('property_image/' . $property->id, $img);
                $newImages->save();
            }
        }

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


    /**
     * search filter by title
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function messages(Property $property){
        $userId = Auth::user()->id;
        if($property->user_id === $userId){
            $messages= Message::where('property_id', $property->id)->orderBy('created_at', 'DESC')->get();
            return view('admin.properties.messages', compact('messages'));
        } else{
            return abort(401);
        }
    }


    /**
     * search filter by title
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sponsorshipsSelect(Property $property){
        $userId = Auth::user()->id;
        if($property->user_id === $userId){
            $sponsorships= Sponsorship::all();
            return view('admin.properties.sponsorshipsSelect', compact('sponsorships','property'));
        } else{
            return abort(401);
        }
    }

    /**
     * search filter by title
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sponsorshipsPay(Request $request, Property $property){
        $planSelected = $request->all()['planSelected'];
        $userId = Auth::user()->id;
        if($property->user_id === $userId){
            $sponsorship= Sponsorship::where('id', $planSelected)->first();
            return view('admin.properties.sponsorshipsPay', compact('sponsorship','property'));
        } else{
            return abort(401);
        }
    }

    /**
     * search filter by title
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sponsorshipsConferm(Request $request, Property $property, Sponsorship $sponsorship){
        $userId = Auth::user()->id;
        if($property->user_id === $userId){
            $property->sponsorships()->attach($sponsorship->id,
            ['start_date' => date("Y-m-d H:i:s"), 'end_date' => date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s"). ' + '.$sponsorship->period.' hours')) ]);
            return redirect()->route('admin.properties.show', $property->slug);
        } else{
            return abort(401);
        }
        //return redirect()->route('admin.properties.show', $property->slug);
    }
}


