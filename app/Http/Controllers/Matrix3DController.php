<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Matrix3D;
use App\Http\Requests;

class Matrix3DController extends Controller
{
    /*
    * @method String evaluate
    * @param Request request
    */
    public function evaluate(Request $request){

        $res = Matrix3D::evaluate($request->all());

        return json_encode([
            "success" => true,
            "data" => $res
        ]);
    }
}
