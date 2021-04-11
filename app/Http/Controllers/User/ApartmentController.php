<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('user.apartment.create');
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

        $newApartment = new Apartment;

        $newApartment->user_id = Auth::id();
        $newApartment->title = $data['title'];
        $newApartment->n_rooms = $data['n_rooms'];
        $newApartment->n_beds = $data['n_beds'];
        $newApartment->n_bathrooms = $data['n_bathrooms'];
        $newApartment->mqs = $data['mqs'];
        $newApartment->address = $data['address'];
        $newApartment->city = $data['city'];
        // $newApartment->longitude = $data['longitude'];
        // $newApartment->latitude = $data['latitude'];
        $newApartment->image = Storage::put('apartment_cover', $data['image']);
        $newApartment->visibility = $data['visibility'];
        $newApartment->visualization = $data['visualization'];

        $newApartment->save();

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
        $data = [
          'apartment' => $apartment
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
