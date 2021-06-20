<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriver;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubcriveController extends Controller
{
    public function store(Request $request)
    {
      
        $this->validate($request,[
            'mail'=> 'required|unique:subscrivers',
        ]);

        $insert=Subscriver::insert([
            'mail'=>$request->mail,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            return response()->json([
                'message' => 'Success'
            ], 201);
        }else{
            return response()->json([
                'error'=>'Faild! Already Taken This Email'
            ],422);
        }
    }
}
