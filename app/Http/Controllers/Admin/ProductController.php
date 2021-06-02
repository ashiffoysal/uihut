<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SoftwareType;
use App\Models\ProductSoftWareLink;
use App\Models\SubCategory;
use App\Models\ReSubCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $allsoftware =SoftwareType::where('is_deleted',0)->get();
        $allcategory =Category::where('is_deleted',0)->get();
        return view('backend.product.create',compact('allsoftware','allcategory'));
    }
    // get subcategory
    public function getsubcategory($cate_id){
        $allsubcategory = SubCategory::where('is_deleted',0)->where('cate_id',$cate_id)->get();
        return response()->json($allsubcategory);
    }
    // resubcategory
    public function getresubcategory($subcate_id){
        $allresubcategory = ReSubCategory::where('is_deleted',0)->where('subcate_id',$subcate_id)->get();
        return response()->json($allresubcategory);
    }
    // 
    public function store(Request $request){
        $proname=$request->title;
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);

        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'product_img' => 'required',
        ]);

        $product=new Product; 
        $product->title=$request->title; 
        $product->cate_id=$request->category;
        $product->subcate_id=$request->subcategory;
        $product->resubcate_id=$request->resubcategory;
        $product->tag=$request->tag;
        $product->slug=$slug;
        $product->description=$request->description;
        $product->product_type=$request->product_type;
        $product->creator_by=Auth::user()->id;
        $product->created_at=Carbon::now()->toDateString();

        if($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/products/thumbnail/' . $ImageName);
            $product->thumbnail_img = $ImageName;
        }
        $photos = array();
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $key => $photo) {
                $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
                $resizedPhoto = Image::make($photo)->save($photoName);
                Storage::disk('public')->put($photoName, $resizedPhoto);
                unlink($photoName);
                array_push($photos, $photoName);
            }
            $product->gallery_img = json_encode($photos);
        }
        $product->save();
        if ($request->software) {
            if (count($request->software) > 0) {
                foreach ($request->software as $item => $v) {
                    $data3 = array(
                        'product_id' => $product->id,
                        'software_id' => $request->software[$item],
                        'software_link' => $request->link[$item],
                        'created_at' => Carbon::now()->toDateTimeString(),
                    );
                    ProductSoftWareLink::Insert($data3);
                }
            }
        }
        if ($product->save()) {
            $notification = array(
                'messege' => 'Insert Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }


        
       

    }
}
