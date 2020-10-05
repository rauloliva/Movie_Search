<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Support\Facades\Validator;

class ImagesAPIController extends Controller
{
    public function main() {
        return response()->json(Images::paginate(1),200);
    }

    public function show($id) {
        $param = ['id' => $id];
        $rules = ['id' => "integer|gte:1"];
        $validator = Validator::make($param, $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $image = Images::findOrFail($id);
        return response()->json($image, 200);
    }
}
