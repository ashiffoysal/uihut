<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ReSubCategory;
use Image;
use Carbon\Carbon;

class ReSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $resubcategory=ReSubCategory::where('is_deleted',0)->get();
        $category=Category::where('is_deleted',0)->get();
        return view('backend.resubcategory.create',compact('resubcategory','category'));
    }
    // innsert
    public function store(Request $request){
       
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
        ]);
        $insert=ReSubCategory::insertGetId([
            'name'=>$request->name,
            'cate_id'=>$request->category,
            'subcate_id'=>$request->subcategory,
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
        $active=ReSubCategory::where('id',$id)->update([
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
        $deactive=ReSubCategory::where('id',$id)->update([
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
        $edit=ReSubCategory::where('id',$id)->first();
        $resubcategory=ReSubCategory::where('is_deleted',0)->get();
        $category=Category::where('is_deleted',0)->get();
       
        return view('backend.resubcategory.update',compact('edit','resubcategory','category'));
    }
    // update
    public function update(Request $request){
       //return $request;
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
        ]);
        $id=$request->id;
        $update=ReSubCategory::where('id',$id)->update([
            'name'=>$request->name,
            'cate_id'=>$request->category,
            'subcate_id'=>$request->subcategory,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.resubcategory.create')->with($notification);
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
        $delete=ReSubCategory::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'Delete Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.resubcategory.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.resubcategory.create')->with($notification);
        }
    }
    // ajax get resubcategory
    public function geSubCategory($cate_id){
        $delete=SubCategory::where('is_deleted',0)->where('cate_id',$cate_id)->get();
        return response()->json($delete);
    }
}
