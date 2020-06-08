<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
        $result = $this->sendAPI($request->movie, $validator);
       // return response()->json($result);
        // $movie = $request->movie;
        return view('catalog')->with('result', $result);
    }

    function sendAPI($param, $validator){
        $response = Http::withHeaders([
                'x-rapidapi-host' => 'imdb8.p.rapidapi.com',
                'x-rapidapi-key' => '6d99670b47mshdf5ba963563c300p19a8b8jsn83ebe70f3a54'
            ])
            ->get('https://imdb8.p.rapidapi.com/title/find', [
                'q' => $param
            ]);
        
        if($response->ok()){
            return $response->json();
        }
    
        $validator->errors()->add('field', 'Something wrong happen');
        return redirect('/')->withErrors($validator);
    }
}
