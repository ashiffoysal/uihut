<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaveProductCollection;
use App\Models\SaveProduct;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;

class UserDashboardController extends Controller
{
    
  
    public function edit(){
    
        $data=Auth::user();
        return response()->json($data);
    }
    // update
    public function update(Request $request){

        $id=Auth::user()->id;
        $post = User::findorFail($id);
        $post->full_name = $request->full_name;
        $post->user_name = $request->user_name;
        $post->address = $request->address;

        if($request->avatar){
            $strpos = strpos($request->avatar,';');
            $sub = substr($request->avatar,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
    
            $img = Image::make($request->avatar)->resize(200, 200);
            $upload_path = public_path()."/uploads/user/";
            $img->save($upload_path.$name);
    
            $post->image = $name;
        }
    	
        if( $post->save()){
            return response()->json([
                'message' => 'Success'
            ], 201);
        }else{
            return response()->json([
                'error'=>'Faild! Already Taken This Email'
            ],422);
        }
    }
    // 
    public function allcollection(){
        $id=Auth::user()->id;
        $data=SaveProduct::where('user_id',$id)->OrderBy('id','DESC')->with('product')->paginate(12);
        if($data){
            return new SaveProductCollection($data);
        }else{
            return response()->json([
                'msg'=>'No Data Found!'
            ],204);
        }
       
    }
    // 
    public function profile(){

        $data=Auth::user();
        return response()->json($data);

    }

    // user dashboard
    public function productdownload(){

        $id=Auth::user()->id;
        $user = User::findOrFail($id);
        if($user->DownloadProduct){
            return response()->json($user->DownloadProduct,200);
        }else{
            return response()->json([
                'msg'=>'No Data Found!'
            ],204);
        }
        
    }
}
