<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/search", "Api\ApartmentController@index");
Route::get("/autocomplete", "Api\ApartmentController@autocomplete");
Route::get("/sponsored", "Api\ApartmentController@sponsoredApartment");
Route::get("/homesearch", "Api\ApartmentController@searchHome");
