<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ClientReview;
use Carbon\Carbon;
use Image;


class ClientReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $client_review=ClientReview::where('is_deleted',0)->get();
        return view('backend.frontendsection.clientreview.create',compact('client_review'));
    }
    // store
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'review' => 'required',
        ]);




        $insert=ClientReview::insertGetId([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'review'=>$request->review,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('video')) {
            $mainimage = $request->file('video')->store('image','public'); 
            ClientReview::where('id', $insert)->update([
                'video' => $mainimage,
            ]);
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'logo' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/client/' . $ImageName);
            ClientReview::where('id',$insert)->update([
                'image' => $ImageName,
            ]);
        }

        if($insert){
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
     // active
     public function active($id){
        $active=ClientReview::where('id',$id)->update([
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
        $deactive=ClientReview::where('id',$id)->update([
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
        $edit=ClientReview::where('id',$id)->first();
        $client_review=ClientReview::where('is_deleted',0)->get();
        return view('backend.frontendsection.clientreview.update',compact('edit','client_review'));
    }
    // update
    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'review' => 'required',
        ]);
        $id=$request->id;
        $update=ClientReview::where('id',$id)->update([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'review'=>$request->review,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('video')) {
            $mainimage = $request->file('video')->store('image','public'); 
            ClientReview::where('id', $id)->update([
                'video' => $mainimage,
            ]);
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'logo' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/client/' . $ImageName);
            ClientReview::where('id',$id)->update([
                'image' => $ImageName,
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
        $delete=ClientReview::where('id',$id)->delete();
        if($delete){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.clientreview.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.clientreview.create')->with($notification);
        }
    }
}
