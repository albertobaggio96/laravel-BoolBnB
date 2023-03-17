<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{

    
  public function uploadImage(Request $request){

        $destinationPath = public_path('/img'); //TODO cambiare path per storage
        $images = [];
        $validator = $request->validate([
            'path.*' => 'required|image|',
            
        ]);

        $image = new Image();
            
        foreach($request->file('path') as $file){
                $fileName = $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);
                $images[] = $fileName;
            }
            
            
        foreach ($images as $image) {
            $newImage = new Image();
            $newImage->path = $image;
            $newImage->property_id = Auth::user()->id; //TODO aggiungere id proprietà (!!non ancora presente nella create)
            $newImage->save();
       }
  }

  public function index() {
    return view('admin.properties.multiImageForm');
  }
}
