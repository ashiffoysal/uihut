<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Carbon\Carbon;

class PackageController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $allpackage=Package::where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.package.create',compact('allpackage'));
    }
    // store
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'access_time_text' => 'required',
            'price' => 'required',
        ]);
        $data = new Package;
        $data->title = $request->title;
        $data->access_time_text = $request->access_time_text;
        $data->price = $request->price;
        $data->paddle_id = $request->paddle_id;
        $data->old_price = $request->old_price;
        $data->feature = json_encode($request->feature);
        if($data->save()){
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
        $active=Package::where('id',$id)->update([
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
        $deactive=Package::where('id',$id)->update([
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
        $edit=Package::where('id',$id)->first();
        $allpackage=Package::where('is_deleted',0)->get();
        return view('backend.package.update',compact('edit','allpackage'));
    }
    // update
    public function update(Request $request){
        $id=$request->id;
        $validated = $request->validate([
            'title' => 'required',
            'access_time_text' => 'required',
            'price' => 'required',
        ]);
        $data = Package::findorFail($id);
        $data->title = $request->title;
        $data->access_time_text = $request->access_time_text;
        $data->price = $request->price;
        $data->paddle_id = $request->paddle_id;
        $data->old_price = $request->old_price;
        $data->feature = json_encode($request->feature);
        if($data->save()){
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // delete
    public function Delete($id){
        $delete=Package::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.package.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.package.create')->with($notification);
        }
    }

}
