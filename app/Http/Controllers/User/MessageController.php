<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;

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
}
