<?php

namespace App\Http\Controllers;

use App\Reviews;
use Illuminate\Support\Facades\Validator;

class ReviewsAPIController extends Controller
{
    public function index() {
        return response()->json(Reviews::paginate(1), 200);
    }

    public function show($id) {
        $param = ['id' => $id];
        $rules = ['id' => "integer|gte:1"];
        $validator = Validator::make($param, $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $review = Reviews::findOrFail($id);
        return response()->json($review, 200);
    }
}
