<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $subcategory=SubCategory::where('is_deleted',0)->get();
        $category=Category::where('is_deleted',0)->get();
        return view('backend.subcategory.create',compact('subcategory','category'));
    }
    // innsert
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);
        $insert=SubCategory::insertGetId([
            'name'=>$request->name,
            'cate_id'=>$request->category,
            'created_at'=>carbon::now()->toDateTimeString(),
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
        $active=SubCategory::where('id',$id)->update([
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
        $deactive=SubCategory::where('id',$id)->update([
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
        $edit=SubCategory::where('id',$id)->first();
        $subcategory=SubCategory::get();
        $category=Category::get();
        return view('backend.subcategory.update',compact('edit','subcategory','category'));
    }
    // update
    public function update(Request $request){
       
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);
        $id=$request->id;
        $update=SubCategory::where('id',$id)->update([
            'name'=>$request->name,
            'cate_id'=>$request->category,
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
        $delete=SubCategory::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'Delete Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.subcategory.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.subcategory.create')->with($notification);
        }
    }
}
