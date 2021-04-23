<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;

class MessageController extends Controller
{
    public function index(Apartment $apartment){

        $message = Message::where('apartment_id', $apartment->id)->get();
        $data = [
            'message' => $message,
            'apartment' => $apartment
        ];

        return view('user.message.index', $data);
    }
}
