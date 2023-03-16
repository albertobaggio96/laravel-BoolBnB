<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    
  public function uploadImage(Request $request){

        $destinationPath = public_path('/img');
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
            
            
        foreach ($images as $imag) {
            $image = new Image();
            $image->file_name = json_encode($image);
            $image->save();
       }
  }
}
