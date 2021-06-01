<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriver;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubscriverController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // update
    public function index(){
        $allsubscriver=Subscriver::orderBy('id','DESC')->get();
        return view('backend.subscriver.index',compact('allsubscriver'));
    }
     // active
     public function active($id){
        $active=Subscriver::where('id',$id)->update([
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
        $deactive=Subscriver::where('id',$id)->update([
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
      // delete
      public function Delete($id){
        $delete=Subscriver::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'Delete Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.subscriver.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.subscriver.create')->with($notification);
        }
    }
}
