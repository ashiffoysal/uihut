<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $category=Category::where('is_deleted',0)->get();
        return view('backend.category.create',compact('category'));
    }
    // store
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $insert=Category::insertGetId([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'-'),
            'icon'=>$request->icon,
            'image'=>'',
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'logo' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/category/' . $ImageName);
            Category::where('id',$insert)->update([
                'image' => $ImageName,
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
        $active=Category::where('id',$id)->update([
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
        $deactive=Category::where('id',$id)->update([
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
        $edit=Category::where('id',$id)->first();
        $category=Category::where('is_deleted',0)->get();
        return view('backend.category.update',compact('edit','category'));
    }
    // update
    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
          
        ]);
        $id=$request->id;
        $update=Category::where('id',$id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'-'),
            'icon'=>$request->icon,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'logo' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/category/' . $ImageName);
            Category::where('id',$id)->update([
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
        $delete=Category::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.category.create')->with($notification);
        }else{
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.category.create')->with($notification);
        }
    }
}
