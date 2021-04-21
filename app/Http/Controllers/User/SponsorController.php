<?php

namespace App\Http\Controllers\User;
use App\Sponsor;
use App\Apartment;
use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index(Apartment $apartment)
    {
      $sponsors = Sponsor::all();
      $images = Image::where('apartment_id', $apartment->id)->get()->toArray();

      $data = [
        'sponsors' => $sponsors,
        'apartment' => $apartment,
        'images' => $images

      ];
      
      return view('user.sponsor.index', $data);
    }
}
