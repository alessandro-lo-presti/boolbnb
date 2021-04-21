<?php

namespace App\Http\Controllers\User;
use App\Sponsor;
use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index(Apartment $apartment)
    {
      $sponsors = Sponsor::all();

      $data = [
        'sponsors' => $sponsors,
        'apartment' => $apartment
      ];
      
      return view('user.sponsor.index', $data);
    }
}
