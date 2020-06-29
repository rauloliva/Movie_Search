<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RapidAPI;

class CatalogController extends Controller
{
    public function index(){
        return view('catalog');
    }

    public function search(Request $request){
        $validator = Validator::make($request->all(),[
            'movie' => 'required'
        ],['The search field is empty']);
    
        if($validator->fails()){
            return redirect('/')->withErrors($validator);
        }
    
        /*if($request->movie !== 'Spiderman'){
            $validator->errors()->add('field', 'Something is wrong with this field!');
            return redirect('/')->withErrors($validator);
        }*/
        $movies = $this->sendAPI($request->movie);
       // return response()->json($result);
        // $movie = $request->movie;
        return view('catalog')->with('movies', $movies);
    }

    function sendAPI($param){
        $api = new RapidAPI('find', 'q', $param);
        $response = $api->execute();
        return $response;
    }
}
