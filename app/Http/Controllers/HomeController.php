<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Image;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function show(Apartment $apartment)
    {
      $services = Service::all();
      $images = Image::where('apartment_id', $apartment->id)->get()->toArray();

        $data = [
            'apartment' => $apartment,
            'services' => $services,
            'images' => $images
        ];

        return view('guest.show', $data);
    }

    public function search()
    {
        return view('guest.search');
    }

    public function sent(Request $request, Apartment $apartment)
  	{
  		  $data = $request->all();

        $data["date"] = new Carbon();

        $newMessage = new Message();
        $newMessage->apartment_id = $apartment->id;
        $newMessage->fill($data);
        $newMessage->save();

        return redirect()->route('send')->with('status', 'ok');
  	}

    public function send()
    {
      return view('guest.send');
    }
}
