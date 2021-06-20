<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Explore;
use Carbon\Carbon;

class ExploreController extends Controller
{
     
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // update
    public function create(){
        $allexplore=Explore::where('is_deleted',0)->get();
        return view('backend.frontendsection.explore.create',compact('allexplore'));
    }
    // 
    public function store(Request $request){

        //return $request;

        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'video' => 'required',
        ]);

        $insert=Explore::insertGetId([
            'title'=>$request->title,
            'details'=>$request->subtitle,
            'details_more'=>json_encode($request->details_more),
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('video')) {
            $mainimage = $request->file('video')->store('image','public'); 
            Explore::where('id', $insert)->update([
                'video' => $mainimage,
            ]);
        }
        if($insert){
            $notification = array(
                'messege' => 'Insert Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
     // active
     public function active($id){
        $active=Explore::where('id',$id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($active){
            $notification = array(
                'messege' => 'Active Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Active Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // deactive
    public function deactive($id){
        $deactive=Explore::where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($deactive){
            $notification = array(
                'messege' => 'Deactive Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Deactive Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id){
        $edit=Explore::where('id',$id)->first();
        $allexplore=Explore::where('is_deleted',0)->get();
        return view('backend.frontendsection.explore.update',compact('edit','allexplore'));
    }
    // update
    public function update(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
           
        ]);
        $id=$request->id;
        $update=Explore::where('id',$id)->update([
            'title'=>$request->title,
            'details'=>$request->subtitle,
            'details_more'=>json_encode($request->details_more),
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('video')) {
            $mainimage = $request->file('video')->store('image','public'); 
            Explore::where('id', $id)->update([
                'video' => $mainimage,
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
    // delete
    public function Delete($id){
        $delete=Explore::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.explore.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.explore.create')->with($notification);
        }
    }
}
