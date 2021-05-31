<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutBanner;
use Carbon\Carbon;

class AboutPageController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // update banner
    public function aboutPageBanner(){
        $edit=AboutBanner::first();
        return view('backend.aboutbanner.update',compact('edit'));
    }
    // update
    public function aboutPageBannerUpdate(Request $request){
        $id=$request->id;
        $validated = $request->validate([
            'text' => 'required',
            'title' => 'required',
        ]);
        $update=AboutBanner::where('id',$id)->update([
            'text'=>$request->text,
            'title'=>$request->title,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
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
}
