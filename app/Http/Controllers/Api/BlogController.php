<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogsCollection;
use App\Http\Resources\AllblogCollection;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blogs;

class BlogController extends Controller
{
    public function index(){

        $allcategory=BlogCategory::where('is_deleted',0)->where('status',1)->get();
        return new BlogsCollection($allcategory);
       
    }
    // Blog
    public function allblog(){

        $allblog=Blogs::with('category')->get();
         return new AllblogCollection($allblog);
        //  return response()->json($allblog,200);
    }
}
