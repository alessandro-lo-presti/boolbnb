<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
    public function index(Request $request) {

      $data = $request->all();

      $query = Apartment::where('title', 'LIKE', "%" . $data["search"] . "%")->get()->toArray();

      return response()->json($query);
    }
}
