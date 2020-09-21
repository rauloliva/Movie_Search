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

    public function show($id) {
        $param = ['id' => $id];
        $rules = ['id' => "integer|gte:1"];
        $validator = Validator::make($param, $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $movie = Movie::with('movie_details')
                      ->with('reviews')
                      ->with('images')->findOrFail($id);
        return response()->json($movie, 200);
    }
}
