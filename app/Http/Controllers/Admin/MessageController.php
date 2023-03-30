<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $filterMessage = Message::with('property')->whereHas('property', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->orderBy('created_at');

        $messages = $filterMessage->get();
        $unreadMessages = $filterMessage->where('displayed', 0)->count();

        return view('layouts.partials.home', compact('messages', 'unreadMessages'));
    }

    public function show(Message $message){
        $userId = Auth::user()->id;

        $autentification = Property::where('id', $message->property->id)->pluck('user_id')->first();
        
        if($autentification === $userId){
            return view('admin.properties.message', compact('message'));
        } else {
            return abort(401);
        }


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message, $redirect)
    {
        if($redirect === 'index'){
            $message->delete();
            return redirect()->route('admin.messages.index');
        } else if($redirect === 'messages'){
            $propertySlug = Property::where('id', $message->property_id)->pluck('slug')->first();
            $message->delete();
            return redirect()->route('admin.properties.messages', $propertySlug);
        }
    }

    public function displayed(Message $message){
        $userId = Auth::user()->id;

        $autentification = Property::where('id', $message->property->id)->pluck('user_id')->first();
        
        if($autentification === $userId){
            $message->displayed = 1;
            $message->update();
            return redirect()->route('admin.messages.show', $message->id);
        } else {
            return abort(401);
        }
    }



}
