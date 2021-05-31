<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Seo;
use App\Models\Social;
use Carbon\Carbon;
use Image;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // setting
    public function generalSetting(){
        $edit=GeneralSetting::first();
        return view('backend.settings.generalsetting',compact('edit'));
    }
    // submit
    public function generalSettingSubmit(Request $request){
        $id=$request->id;
        $update=GeneralSetting::where('id',$id)->update([
            'company_name'=>$request->company_name,
            'company_motto'=>$request->company_motto,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'telephone'=>$request->telephone,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $ImageName = 'logo' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/logo/' . $ImageName);
            GeneralSetting::where('id', $id)->update([
                'logo' => $ImageName,
            ]);
        }
        if($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $ImageName = 'favicon' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(350, 350)->save('public/uploads/logo/' . $ImageName);
            GeneralSetting::where('id', $id)->update([
                'favicon' => $ImageName,
            ]);
        }

        if($update){
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
    // seo
    public function seoSetting(){
        $edit=Seo::first();
        return view('backend.seo.seo',compact('edit'));
    }
    // submit
    public function seoSettingSubmit(Request $request){
        $id=$request->id;
        $update=Seo::where('id',$id)->update([
            'meta_title'=>$request->meta_title,
            'meta_author'=>$request->meta_author,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'google_verification'=>$request->google_verification,
            'bing_verification'=>$request->bing_verification,
            'google_analytics'=>$request->google_analytics,
            'alexa_analytics'=>$request->alexa_analytics,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function socialSetting(){
        $edit=Social::first();
        return view('backend.social.social',compact('edit'));
    }
    public function socialSettingSubmit(Request $request){
      
        $id=$request->id;
        $update=Social::where('id',$id)->update([
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkend'=>$request->linkend,
            'youtube'=>$request->youtube,
            'skype'=>$request->skype,
            'google_plus'=>$request->google_plus,
            'feed'=>$request->feed,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
