<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Carbon\Carbon;

class FaqController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $allfaq=Faq::where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.faq.create',compact('allfaq'));
    }
    // store
    public function store(Request $request){
        $validated = $request->validate([
            'faq_ques' => 'required',
            'faq_ans' => 'required',
          
        ]);
        $insert=Faq::insert([
            'faq_ques'=>$request->faq_ques,
            'faq_ans'=>$request->faq_ans,
            'created_at'=>Carbon::now()->toDateTimeString(),
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
      // active
      public function active($id){
        $active=Faq::where('id',$id)->update([
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
        $deactive=Faq::where('id',$id)->update([
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
        $edit=Faq::where('id',$id)->first();
        $allfaq=Faq::where('is_deleted',0)->get();
        return view('backend.faq.update',compact('edit','allfaq'));
    }
    // update
    public function update(Request $request){
        $id=$request->id;
        $validated = $request->validate([
            'faq_ques' => 'required',
            'faq_ans' => 'required',
        ]);
        $update=Faq::where('id',$id)->update([
            'faq_ques'=>$request->faq_ques,
            'faq_ans'=>$request->faq_ans,
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
    // delete
    public function Delete($id){
        $delete=Faq::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.faq.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.faq.create')->with($notification);
        }
    }

}
