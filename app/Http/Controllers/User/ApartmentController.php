<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Message;
use App\Service;
use App\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();

        $data = [
            'apartments' => $apartments
        ];

        return view('user.apartment.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        $data =  [
            "services" => $services
        ];

        return view('user.apartment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // validation
        $request->validate([
          "title" => "required|max:50",
          "n_rooms" => "required",
          "n_beds" => "required",
          "n_bathrooms" => "required",
          "mqs" => "required",
          "address" => "required|max:100",
          "city" => "required|max:30"
        ]);

        $newApartment = new Apartment;

        $newApartment->user_id = Auth::id();
        $data["longitude"] = 0;
        $data["latitude"] = 0;
        $data["visibility"] = 1;
        $data["visualization"] = 0;

        if(array_key_exists('apartment_image', $data)) {
          $data["image"] = Storage::put("covers", $data["apartment_image"]);
        }

        $newApartment->fill($data);
        $newApartment->save();

        if(array_key_exists('services', $data)) {
          $newApartment->services()->sync($data["services"]);
        }

        return redirect()->route('apartment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $data = [
            'apartment' => $apartment
        ];
        return view('user.apartment.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();

        $data = [
          'apartment' => $apartment,
          "services" => $services
        ];

        return view('user.apartment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->all();

        // validation
        $request->validate([
            "title" => "required|max:50",
            "n_rooms" => "required",
            "n_beds" => "required",
            "n_bathrooms" => "required",
            "mqs" => "required",
            "address" => "required|max:100",
            "city" => "required|max:30"
          ]);

        if(!is_null($apartment->image)) {
          Storage::delete($apartment->image);
        }

        if(array_key_exists('apartment_image', $data)) {
          $data["image"] = Storage::put("covers", $data["apartment_image"]);
        }


        $apartment->update($data);

        if(array_key_exists('services', $data)) {
          $apartment->services()->sync($data["services"]);
        }

        return redirect()->route('apartment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $messages = Message::where('apartment_id', $apartment->id)->get();

        foreach ($messages as $message) {
          $message->delete();
        }

        $apartment->sponsors()->sync([]);
        $apartment->services()->sync([]);

        $apartment->delete();

        return redirect()->route('apartment.index');
    }

}
