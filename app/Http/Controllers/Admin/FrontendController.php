<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeFirstSection;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Image;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // 1st section
    public function firstSection(){
        $edit=HomeFirstSection::first();
        return view('backend.frontendsection.firstsection.update',compact('edit'));
    }
    public function firstSectionUpdate(Request $request){
       
        $id=$request->id;
        $update=HomeFirstSection::where('id',$id)->update([
            'heading_text'=>$request->heading_text,
            'sub_text'=>$request->sub_text,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('video_link')) {
            
            $mainimage = $request->file('video_link')->store('image','public'); 

            HomeFirstSection::where('id', $id)->update([
                'video_link' => $mainimage,
            ]);
        }
            

        if($update){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // 
}
