<?php

use App\Movie;
use App\Movie_details;
use App\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/show',function() {
    $movie = Movie::where("key","=","tt4154796")->with(['movie_details',
                        'reviews','images'])->get();
    return response()->json($movie);
});

Route::get('/movies','MovieAPIController@main');
Route::get('/movies/show/{id}', 'MovieAPIController@show');

Route::get('/reviews', 'ReviewsAPIController@index');
Route::get('/reviews/show/{id}', 'ReviewsAPIController@show');