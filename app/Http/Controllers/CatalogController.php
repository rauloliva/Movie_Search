<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $movies = $this->RequestAPI(['q' => $request->movie]);
    //    return response()->json($movies);
        $navOptions = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Contact', 'url' => '/contact'],
            ['title' => 'Help', 'url' => '/help'],
            ['title' => 'API', 'url' => '/docs']
        ];
        return view('catalog')->with('movies', $movies)->with('navOptions', $navOptions);
    }

    function RequestAPI($param){
        $api = new RapidAPI('find', $param);
        $response = $api->execute();
        return $response;
    }
}
