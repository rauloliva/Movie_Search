<?php

use App\Movie;
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

Route::get('/movies','MovieAPIController@main');
Route::get('/movies/{id}', 'MovieAPIController@show');

Route::get('/reviews', 'ReviewsAPIController@index');
Route::get('/reviews/{id}', 'ReviewsAPIController@show');

Route::get('/images', 'ImagesAPIController@main');
Route::get('/images/{id}', 'ImagesAPIController@show');