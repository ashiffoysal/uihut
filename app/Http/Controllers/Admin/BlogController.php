<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blogs;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function categoryIndex()
    {
        $categores = BlogCategory::where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('backend.blog.category.create',compact('categores'));
    }

    // category create

    public function categoryCreate(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $blogCate= New BlogCategory();
        $blogCate->name = $request->name;
        $blogCate->save();
        $notification = array(
            'messege' => 'Insert Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Category Status Change
    public function categoryStatusChange($id)
    {
        $category = BlogCategory::findOrFail($id);
        if($category){
            if($category->status == 1){
                $category->status = 0;
                $category->save();
                $notification = array(
                    'messege' => 'Deactive Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $category->status = 1;
                $category->save();
                $notification = array(
                    'messege' => 'Active Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'messege' => 'Status Change Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
       
    }

    // Category Edit

    public function categoryEdit($id)
    {
        $categores = BlogCategory::where('is_deleted',0)->orderBy('id', 'desc')->get();
        $category = BlogCategory::findOrFail($id);
        return view('backend.blog.category.update',compact('categores','category'));
    }

    // Category Update

    public function categoryUpdate(Request $request , $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $blogCate=BlogCategory::findOrFail($id);
        $blogCate->name = $request->name;
        $blogCate->save();
        $notification = array(
            'messege' => 'Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    // category delete

    public function categoryDelete($id)
    {
        $blogCate=BlogCategory::findOrFail($id);   
        if($blogCate){
            $blogCate->is_deleted = 1;
            $blogCate->save();
            $notification = array(
                'messege' => 'Delete Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.category')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Category Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    // show blog items

    public function blogsIndex()
    {
        $blogs = Blogs::with(['category','creadedby'])->where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('backend.blog.index',compact('blogs'));
    }

    // show blog create page
    public function blogsCreate(Request $request)
    {
        $categores = BlogCategory::where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('backend.blog.create',compact('categores'));
    }

    // store blog 
    public function blogStore(Request $request)
    {
        $request->validate([
            'blog_title'=>'required',
            'blog_category'=>'required',
            'blog_details'=>'required',
            'blog_tags'=>'required',
            'thumbnail_img'=>'required',
        ]);

        $blog = new Blogs();
        $blog->title = $request->blog_title;
        $blog->category_id = $request->blog_category;
        $blog->details = $request->blog_details;
        $blog->tags = $request->blog_tags;
        if ($request->hasFile('thumbnail_img')) {
            $blog_img = $request->file('thumbnail_img');
            $imagename = rand(11111111111,99999999999). '.' . $blog_img->getClientOriginalExtension();
            Image::make($blog_img)->resize(600, 400)->save(base_path('public/uploads/blogs/'. $imagename),100);
            $blog->image = $imagename;
        }
        $blog->created_by = Auth::user()->id;
        $blog->save();

        $notification = array(
            'messege' => 'Blog Create Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.index')->with($notification);
    }

    // change blog status

    public function blogsStatus($id)
    {
        
        $blog = Blogs::findOrFail($id);
        if($blog){
            if($blog->status ==1){
                $blog->status = 0;
                $blog->save();
                $notification = array(
                    'messege' => 'Deactive Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

            }else{
                $blog->status = 1;
                $blog->save();
                $notification = array(
                    'messege' => 'Active Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'messege' => 'Status Change Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // edit blog page
    public function blogsEdit($id)
    {
        $categores = BlogCategory::where('is_deleted',0)->orderBy('id', 'desc')->get();
        $blog = Blogs::findOrFail($id);
        return view('backend.blog.update',compact('categores','blog'));
    }

}
