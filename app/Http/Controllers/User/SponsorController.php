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

      $gateway = new \Braintree\Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
      ]);

      $data = [
        'sponsors' => $sponsors,
        'apartment' => $apartment,
        'images' => $images,
        'token' => $clientToken = $gateway->clientToken()->generate(),
      ];

      return view('user.sponsor.index', $data);
    }

}
