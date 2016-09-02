<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Cube;

use App\Http\Requests;

class Matrix3DController extends Controller
{
    //
    public function index(){
        return view('cube');
    }

    /*
    @method calculate
    @params $request
    */    
    public function calculate(Request $request){

        $input = $request->all();
        $results = Cube::calculate($input);

        Session::flash('results', json_encode($results));
        return Redirect::to('/');
    }

    /*
    * @method evaluate
    * @params $request
    */
    
    public function evaluate(Request $request){

        $data = [
            "res1" => 1
        ];

        return json_encode([
            "success" => true,
            "data" => $data
        ]);
    }


}
