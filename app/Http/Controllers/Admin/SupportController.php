<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsAndCondition;
use App\Models\PrivacyPolicy;
use App\Models\License;
use Carbon\Carbon;

class SupportController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // update
    public function termsupdate(){
        $edit=TermsAndCondition::first();
        return view('backend.support.terms_&_condition',compact('edit'));
    }
    // termsconditionupdate
    public function termsconditionupdate(Request $request){
        $id=$request->id;
        $validated = $request->validate([
            'details' => 'required',
        ]);
        $update=TermsAndCondition::where('id',$id)->update([
            'details'=>$request->details,
            'created_at'=>Carbon::now()->toDateTimeString(),
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
    // licensing
    public function privacypolicyupdate(){
        $edit=PrivacyPolicy::first();
        return view('backend.support.privacy_&_policy',compact('edit'));
    }
    // licensing
    public function privacypolicyupdateSubmit(Request $request){
        $id=$request->id;
        $validated = $request->validate([
            'details' => 'required',
        ]);
        $update=PrivacyPolicy::where('id',$id)->update([
            'details'=>$request->details,
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
    // license
    public function licenseupdate(){
        $edit=License::first();
        return view('backend.support.license',compact('edit'));
    }
    // lincesn
    public function licenseupdateSubmit(Request $request){
        $id=$request->id;
        $validated = $request->validate([
            'details' => 'required',
        ]);
        $update=License::where('id',$id)->update([
            'details'=>$request->details,
            'subtext'=>$request->subtext,
            'aggrement'=>$request->aggrement,
            'you_can'=>$request->you_can,
            'you_cannot'=>$request->you_cannot,
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
