<?php

use App\Images;
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

Route::get('/', function () {;
    return view('home')->with('navOptions', [
        ['title' => 'About', 'url' => '/about'],
        ['title' => 'Contact', 'url' => '/contact'],
        ['title' => 'Help', 'url' => '/help'],
        ['title' => 'API', 'url' => '/docs']
    ]);
});

Route::post('/catalog/search', 'CatalogController@search');

Route::resource('catalog', 'CatalogController');

Route::resource('movie', 'MovieController');

Route::get('/movie/review/{id}', 'MovieController@showReview');

Route::get('/about', function () {
    return view('about')->with('navOptions', [
        ['title' => 'Home', 'url' => '/'],
        ['title' => 'Contact', 'url' => '/contact'],
        ['title' => 'Help', 'url' => '/help'],
        ['title' => 'API', 'url' => '/docs']
    ]);
});

Route::get('/contact', function () {
    return view('contact')->with('navOptions', [
        ['title' => 'Home', 'url' => '/'],
        ['title' => 'Contact', 'url' => '/contact'],
        ['title' => 'Help', 'url' => '/help'],
        ['title' => 'API', 'url' => '/docs']
    ]);
});

Route::get('/docs', function() {
    return view('docs');
});