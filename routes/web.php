<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index")->name("index");
Route::get('/search', "HomeController@search")->name("search");

Auth::routes();


Route::prefix('user')
		->namespace('User')
		->middleware('auth')
		->group(function () {
            Route::get('/', 'HomeController@index')->name('home');
						Route::get('/sponsor/{apartment}', 'SponsorController@index')->name('sponsor.index');
            Route::resource('apartment', 'ApartmentController');
					});
