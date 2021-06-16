<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SoftwareType;
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
    public function create()
    {
        $allsoftware = SoftwareType::where('is_deleted', 0)->get();
        $allcategory = Category::where('is_deleted', 0)->get();
        return view('backend.product.create', compact('allsoftware', 'allcategory'));
    }
    // index
    public function index()
    {
        $allproduct = Product::where('is_deleted', 0)->orderBy('id', 'DESC')->get();
        return view('backend.product.index', compact('allproduct'));
    }
    // get subcategory
    public function getsubcategory($cate_id)
    {
        $allsubcategory = SubCategory::where('is_deleted', 0)->where('cate_id', $cate_id)->get();
        return response()->json($allsubcategory);
    }
    // resubcategory
    public function getresubcategory($subcate_id)
    {
        $allresubcategory = ReSubCategory::where('is_deleted', 0)->where('subcate_id', $subcate_id)->get();
        return response()->json($allresubcategory);
    }
    public function store(Request $request)
    {
        
        $proname = $request->title;
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);

        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'product_img' => 'required',
        ]);

        $cat = Category::findOrFail($request->category);
        $cat_slug = $cat?$cat->slug:' ';

        $subcat = SubCategory::findOrFail($request->subcategory);
        $subcat_slug = $subcat?$subcat->slug:' ';

        $product = new Product;
        $product->title = $request->title;
        $product->cate_id = $request->category;
        $product->cat_slug = $cat_slug;
        $product->subcate_id = $request->subcategory;
        $product->subcat_slug = $subcat_slug;
        $product->resubcate_id = $request->resubcategory;
        $product->tag = $request->tag;
        $product->slug = $slug;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->product_type = $request->product_type;
        $product->file_type = $request->file_type;
        $product->creator_by = Auth::user()->id;
        $product->created_at = Carbon::now()->toDateString();

        switch ($request->input('submit')) {
            case 'savedraft':
                $product->draft = 0;
                break;
            case 'publish':
                $product->draft = 1;
                break;
        }

        if ($request->hasFile('product_img')) {
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
        
        if($request->file_type == '2'){

            $software=[];

            foreach ($request->software as $key => $lolsoftware) {
                array_push($software,$lolsoftware);
            }
            $product->software = json_encode($software);

            $alllinks=[];
            foreach ($request->link as $key => $lollink) {
                array_push($alllinks,$lollink);
            }
            $product->link = json_encode($alllinks);


        }elseif ($request->file_type == '1'){

            $software=[];
            foreach ($request->softwarenew as $key => $lolsoftware) {
                array_push($software,$lolsoftware);
            }
            $product->software = json_encode($software);

            $softwarelinknew = array();
            if($request->hasFile('linkfile')) {

                foreach ($request->linkfile as $key => $photo) {
                    $sfotwareitemID =$software[$key]; 
                    $name = time().$sfotwareitemID.'.'.$photo->getClientOriginalExtension();
                    $newfile =$photo->move(public_path().'/uploads/', $name);
                    array_push($softwarelinknew, $name);
                }
                $product->link = json_encode($softwarelinknew);

            }


        }

        $product->save();
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
    

    public function active($id)
    {
        $active = Product::where('id', $id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Active Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Active Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // deactive
    public function deactive($id)
    {
        $deactive = Product::where('id', $id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Deactive Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Deactive Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id)
    {
        $edit = Product::where('id', $id)->first();
        $allcategory = Category::where('is_deleted', 0)->get();

        $allsoftware = SoftwareType::where('is_deleted', 0)->get();
        return view('backend.product.update', compact('edit', 'allcategory', 'allsoftware'));
    }
    // update
    public function update(Request $request)
    {
        $id=$request->id;
        $proname = $request->title;
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);

        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
           
        ]);

        $cat = Category::findOrFail($request->category);
        $cat_slug = $cat?$cat->slug:' ';

        $subcat = SubCategory::findOrFail($request->subcategory);
        $subcat_slug = $subcat?$subcat->slug:' ';


        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->cate_id = $request->category;
        $product->cat_slug = $cat_slug;
        $product->subcate_id = $request->subcategory;
        $product->subcat_slug = $subcat_slug;
        $product->resubcate_id = $request->resubcategory;
        $product->tag = $request->tag;
        $product->slug = $slug;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->product_type = $request->product_type;
        $product->file_type = $request->file_type;
        $product->creator_by = Auth::user()->id;
        $product->updated_at = Carbon::now()->toDateString();

        if($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/products/thumbnail/' . $ImageName);
            $product->thumbnail_img = $ImageName;
        }

        if ($request->has('previous_photos')) {
            $photos = $request->previous_photos;
        } else {
            $photos = array();
        }
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $key => $photo) {
                $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
                $resizedPhoto = Image::make($photo)->save($photoName);
                Storage::disk('public')->put($photoName, $resizedPhoto);
                unlink($photoName);
                array_push($photos, $photoName);
            }
        }
        $product->gallery_img = json_encode($photos);
        $product->save();
        if ($request->file_type == '2') {

            $software=[];
            foreach ($request->software as $key => $lolsoftware) {
                array_push($software,$lolsoftware);
            }
            $product->software = json_encode($software);

            $alllinks=[];
            foreach ($request->link as $key => $lollink) {
                array_push($alllinks,$lollink);
            }
            $product->link = json_encode($alllinks);
          

        }elseif ($request->file_type == '1') {
            $software=[];
            foreach ($request->softwarenew as $key => $lolsoftware) {
                array_push($software,$lolsoftware);
            }
            $product->software = json_encode($software);


            // $loka =$photos
            if ($request->has('previouslinkupdate')) {
                $loka = $request->previouslinkupdate;
            } else {
                $loka = array();
            }

            if($request->hasFile('linkfile')) {
                foreach ($request->linkfile as $key => $photo) {
                    $sfotwareitemID =$software[$key]; 
                    $name = time().$sfotwareitemID.'.'.$photo->getClientOriginalExtension();
                    $newfile =$photo->move(public_path().'/uploads/', $name);
                    array_push($loka, $name);
                }
                $product->link = json_encode($loka);

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
    // delete
    public function Delete($id)
    {
        $delete = Product::where('id', $id)->update([
            'is_deleted' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($delete) {
            $notification = array(
                'messege' => 'update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.product.create')->with($notification);
        } else {
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.product.create')->with($notification);
        }
    }
//new all delete
    public function deleteall(Request $request){
        $deleteid = $request['delid'];
        if ($deleteid) {
            $deletpost = Product::whereIn('id', $deleteid)->update([
                'is_deleted'=>1,
            ]);
            if ($deletpost) {
                $notification = array(
                    'messege' => 'Multiple Delete Success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Multiple Delete Faild',
                    'alert-type' => 'errors'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Nothing To Delete',
                'alert-type' => 'info'
            );
            return Redirect()->back()->with($notification);
        }
    }



}
