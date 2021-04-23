<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Image;

class ApartmentController extends Controller
{

  public function index(Request $request) {
    $data = $request->all();

    if(array_key_exists('title', $data)) {

      $apartments = Apartment::where('title', 'LIKE', '%'.$data['title'].'%')->get();

      foreach($apartments as $apartment) {
        $image = Image::where('apartment_id', $apartment->id)->first();
        $apartment->image = $image->path;
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

}
