<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RapidAPI;

class MovieController extends Controller
{
    public function show($id){
        $movie = $this->sendAPI($id);
        $movie['id'] = str_replace('/','',
                       str_replace('title','',$movie['id']));
        return view('movie')->with('movie', $movie);
    }

    function sendAPI($param){
        $api = new RapidAPI('get-details', 'tconst', $param);
        $response = $api->execute();
        return $response;
    }
}
