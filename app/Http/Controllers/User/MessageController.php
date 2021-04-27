<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Message;

class MessageController extends Controller
{
    public function index(Apartment $apartment){


        if(Auth::id() == $apartment->user_id) {
          $messages = Message::where('apartment_id', $apartment->id)->get();
          $data = [
              'messages' => $messages,
              'apartment' => $apartment
          ];

          return view('user.message.index', $data);
        }

        return redirect()->route('home');

    }


    public function show(Apartment $apartment, Message $message){

        if(Auth::id() == $apartment->user_id) {
          $data = [
              'message' => $message,
              'apartment' => $apartment
          ];

          return view('user.message.show', $data);
        }

        return redirect()->route('home');
    }

    public function destroy(Apartment $apartment, Message $message){

        $message->delete();

        return redirect()->route('message.index', $apartment->id);
    }

}
