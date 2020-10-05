<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Validator;

class MovieAPIController extends Controller
{
    public function main() {
        return response()->json(Movie::paginate(1), 200);
    }

    public function show($title) {
        $param = ['title' => $title];
        $rules = ['title' => "required"];
        $validator = Validator::make($param, $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $movie = Movie::with('movie_details')
                      ->with('reviews')
                      ->with('images')->where('title', 'like', $title)->get();
        return response()->json($movie, 200);
    }
}
