<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoftwareType;
use Carbon\Carbon;

class SoftwareTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // dashboard
    public function create(){  
        $allsoftware=SoftwareType::where('is_deleted',0)->get();
        return view('backend.softwaretype.create',compact('allsoftware'));
    }
    // store
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);
        $insert=SoftwareType::insertGetId([
            'name' => $request->name,
            'icon' => $request->icon,
            'created_at' => Carbon::now()->toDateString(),
        ]);
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
    // 
    // active
    public function active($id){
        $active=SoftwareType::where('id',$id)->update([
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
        $deactive=SoftwareType::where('id',$id)->update([
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
        $edit=SoftwareType::where('id',$id)->first();
        $allsoftware=SoftwareType::where('is_deleted',0)->get();
        return view('backend.softwaretype.update',compact('edit','allsoftware'));
    }
    // update
    public function update(Request $request){
        //return $request;
        $validated = $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);
        $id=$request->id;
        $update=SoftwareType::where('id',$id)->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'updated_at' => Carbon::now()->toDateString(),
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
    // delete
    public function Delete($id){
        $delete=SoftwareType::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'Delete Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.softwaretype.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.softwaretype.create')->with($notification);
        }
    }

}
