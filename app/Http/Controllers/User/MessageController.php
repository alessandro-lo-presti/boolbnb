<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index(Apartment $apartment){

        $messages = Message::where('apartment_id', $apartment->id)->get();
        $data = [
            'messages' => $messages,
            'apartment' => $apartment
        ];

        return view('user.message.index', $data);
    }


    public function show(Apartment $apartment, Message $message){

        $data = [
            'message' => $message
        ];

        return view('user.message.show', $data);
    }

    public function destroy(Apartment $apartment, Message $message){

        $message->delete();

        return redirect()->route('message.index', $apartment->id);
    }

}
