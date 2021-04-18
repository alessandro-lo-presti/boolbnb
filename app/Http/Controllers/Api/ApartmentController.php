<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
  public function index(Request $request) {
    $data = $request->all();
    $apartments = Apartment::where('title', 'LIKE', '%'.$data['search'].'%')->get();
    return response()->json([
      "success" => true,
      "response" => $apartments
    ]);
  }
}
