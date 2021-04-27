<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Image;
use Carbon\Carbon;

class ApartmentController extends Controller
{

  public function index(Request $request) {
    $data = $request->all();

    if(array_key_exists('title', $data)) {

      $apartments = Apartment::where('title', 'LIKE', '%'.$data['title'].'%')->get();

      foreach($apartments as $apartment) {

        $image = Image::where('apartment_id', $apartment->id)->first();
        if($image != null) {
          $apartment->image = $image->path;
        }

        $services = DB::table('apartment_service')->where('apartment_id', $apartment->id)->get()->pluck('service_id');
        if($services != null) {
          $apartment->services = $services;
        }
      }

      return response()->json([
        "success" => true,
        "response" => $apartments
      ]);
    }
    else {
      return response()->json([
        "success" => false,
        "error" => "Errore nella richiesta"
      ]);
    }
  }

  public function autocomplete(Request $request) {
    $data = $request->all();

    if(array_key_exists('title', $data)) {
      $apartments = Apartment::select('title')->where('title', 'LIKE', $data['title'].'%')->pluck('title');
      return response()->json([
        "success" => true,
        "response" => $apartments
      ]);
    }
    else {
      return response()->json([
        "success" => false,
        "error" => "Errore nella richiesta"
      ]);
    }
  }

  public function sponsoredApartment(Request $request){
    $date = new Carbon();
    $apartments = DB::table('apartment_sponsor')->where('end', '>', $date )->limit(8)->get();

      foreach($apartments as $apartment) {

        $image = Image::where('apartment_id', $apartment->id)->first();
        if($image != null) {
          $apartment->image = $image->path;
        }
        
        $data = Apartment::select('title', 'city')->where('id', $apartment->id)->get()->toArray();

        $apartment->title = $data[0]['title'];
        $apartment->city = $data[0]['city'];

      }


    return response()->json([
        "success" => true,
        "response" => $data
      ]);
  }

}
