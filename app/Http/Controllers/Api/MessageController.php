<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function message(Request $request, Property $property){
        
        $validator = Validator::make($request->all(), [
            'mail_from' => 'required|email',
            'name' => 'required|string|max:254',
            'subject' => 'required|string|max:254',
            'body_message' => 'required|string|min:20|max:65535'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'errorMessage' =>  $validator->errors()
            ];
        return response()->json($response);
        }

        $data = $validator->validated();
        $newMessage = new Message();
        $newMessage->property_id = $property['id'];
        $newMessage->fill($data);
        $newMessage->displayed = false;
        $newMessage->save();
        return response()->json(['success' => true, 'data' => $data]);
    }
}
