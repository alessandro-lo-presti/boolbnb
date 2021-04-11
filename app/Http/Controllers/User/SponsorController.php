<?php

namespace App\Http\Controllers\User;
use App\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
      $sponsors = Sponsor::all();
      $data = [
        'sponsors' => $sponsors
      ];
      return view('user.sponsor.index', $data);
    }
}
