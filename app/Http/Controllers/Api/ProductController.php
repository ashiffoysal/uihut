<?php

namespace App\Http\Controllers\Api;

use App\Helper\SoftwareRelationship;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSaveResource;
use App\Http\Resources\ReSubCategoryCollection;
use App\Http\Resources\SaveProductCollection;
use App\Http\Resources\SubCategoryCollection;
use App\Models\Category;
use App\Models\Product;
use App\Models\ReSubCategory;
use App\Models\SaveProduct;
use App\Models\SoftwareType;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Paddle\Customer;
use DB;
use GuzzleHttp\Psr7\Response;
use App\Http\Models\User;

class ProductController extends Controller
{
    // Get category
    public function getCategores()
    {
        return new ProductCategoryCollection(Category::where('status', 1)->where('is_deleted', 0)->get());
    }

    // get subcategory
    public function getSubCategores($id)
    {
        $cat = Category::where('slug', $id)->first();
        if ($cat) {
            return new SubCategoryCollection(SubCategory::where('cate_id', $cat->id)->where('status', 1)->where('is_deleted', 0)->get());
        }
    }

    // get resubcategory
    public function getReSubCategores($id, $subID)
    {
        $cat = Category::where('slug', $id)->first();
        $subcat = SubCategory::where('slug', $subID)->first();
        if ($cat && $subcat) {
            return new ReSubCategoryCollection(ReSubCategory::withCount('products')->where('cate_id', $cat->id)->where('subcate_id', $subcat->id)->where('status', 1)->where('is_deleted', 0)->get());
        }
    }

    // get product by ID
    public function getProductByID($cat, $subcat)
    {
        $category = Category::where('slug', $cat)->first();
        $subcat = SubCategory::where('slug', $subcat)->first();
        if ($category && $subcat) {
            $products = Product::where('cate_id', $category->id)->where('subcate_id', $subcat->id)->where('status', 1)->where('is_deleted', 0)->paginate(20);
            return new ProductCollection($products);
        }
    }

    // Get Single Product

    public function getSingleProduct($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    // Get Filter Product
    public function getFilterProduct(Request $request, $cat, $subcat)
    {
        $resubcat = $request->input('resubcat', []);
        $search = $request->search;
        $filter = $request->input('filter', []);
        $free = $request->input('free', []);

        $products = Product::when(isset($cat), function ($q) use ($cat) {
            $q->where('cat_slug', $cat);
        })->when(isset($subcat), function ($q) use ($subcat) {
            $q->where('subcat_slug', $subcat);
        })->when(count($resubcat), function ($q) use ($resubcat) {
            $q->whereIn('resubcate_id', $resubcat);
        })->when(isset($search), function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%');
        })->when(count($free), function ($q) {
            $q->where('product_type', 2);
        })->when(count($filter), function ($q) use ($filter) {
            foreach ($filter as $value) {
                $q->where('software', 'like', '%' . $value . '%');
            }
        })
            ->paginate(20);
        return new ProductCollection($products);
    }


    // Count Free Item by Category & Sub Category Name
    public function countFreeItem($cat, $subcat)
    {
        $category = Category::where('slug', $cat)->first();
        $subcat = SubCategory::where('slug', $subcat)->first();
        if ($category && $subcat) {
            $products = Product::where('cate_id', $category->id)->where('subcate_id', $subcat->id)->where('status', 1)->where('is_deleted', 0)->paginate(10);

            return response()->json([
                'countProduct' => count($products),
                'countFreeItem' => count($products->where('product_type', 2)),
            ]);
        }
    }

    // Get Software Type
    public function softwareType()
    {
        $types = SoftwareType::where('status', 1)->where('is_deleted', 0)->get();
        return response()->json($types);
    }

    // Get ResubCategory Tag
    public function getResubCategoreTag(Request $request)
    {
        $resubcat = ReSubCategory::whereIn('id', $request)->get();
        return response()->json($resubcat, 200);
    }

    // Search ReSubCategores
    public function searchReSubCat($cat, $subcat)
    {
        $cat = Category::where('slug', $cat)->first();
        $subcat = SubCategory::where('slug', $subcat)->first();
        $search = request()[0];
        if ($cat && $subcat) {
            $searchData = ReSubCategory::withCount('products')->where('cate_id', $cat->id)->where('subcate_id', $subcat->id)->where('name', 'like', '%' . $search . '%')
                ->where('status', 1)->where('is_deleted', 0)->get();
            return new ReSubCategoryCollection($searchData);
        }
    }

    // product save
    public function productSave($id)
    {
        $saveProduct = SaveProduct::where('user_id', auth()->user()->id)->where('product_id', $id)->first();

        if ($saveProduct) {
            return response()->json([
                'msg' => 'Product already Saved!',
            ], 200);
        }

        $product = new SaveProduct();
        $product->product_id = $id;
        $product->user_id = Auth::user()->id;
        if ($product->save()) {
            $saveProduct = SaveProduct::with('product')->where('user_id', auth()->user()->id)->get();
            return response()->json([
                'msg' => 'Product Save Successfully!',
                'data' => new SaveProductCollection($saveProduct),
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Product Save Faild!'
            ], 500);
        }
    }


    // get Save Prodct
    public function getSaveProduct()
    {
        $saveProduct = SaveProduct::with('product')->where('user_id', auth()->user()->id)->get();
        return new SaveProductCollection($saveProduct);
    }

    // Get Product Download Link
    public function getDownloadLink(Request $request)
    {
        $id=Auth::user()->id;
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);
        if($product){
                $product->increment('download',1);
                $user =User::findOrFail($id);
                $user->downloads_product=json_encode($product_id);
                $user->save();
                
            if ($product->file_type == 2) {
                $name = $request->name;
                $software = SoftwareRelationship::doRelation($product->software, $product->link);
                $item = array();
                foreach ($software as $key => $value) {
                    $item[$key] = $value;
                }
                if (array_key_exists($name, $item)) {
                    $link = $item[$name];
                    $ext =explode('.',$link);

                    return response()->json([
                        'link' => $link,
                        'product' => $product,
                        'ext' => $ext[1],
                    ], 200);
                }
            } elseif ($product->file_type == 1) {
                $name = $request->name;
                $software = SoftwareRelationship::doRelation($product->software, $product->link);
                $item = array();
                foreach ($software as $key => $value) {
                    $item[$key] = $value;
                }
                if (array_key_exists($name, $item)) {
                    $link = $item[$name];
                    $ext =explode('.',$link);
                    return response()->json([
                        'link' =>asset('public/uploads/').'/'.$link,
                        'product' => $product,
                        'ext' => $ext[1],
                    ], 200);
                }
            }



        }
    }

    // check Subcriber
    public function checkSubscriber()
    {
        $id = auth()->user()->id;
        $customars = DB::table('customers')->where('billable_id', $id)->first();
        if ($customars) {
            $subcriber = DB::table('subscriptions')->where('billable_id', $id)->where('paddle_status', 'trialing')->orderBy('id', 'desc')->first();
        }

        if ($subcriber) {
            return response()->json($subcriber, 200);
        } else {
            return response()->json('Subcriber Not Found!', 500);
        }
    }

    // Get Similer Product
    public function similerProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $products = Product::where('cate_id', $product->cate_id)->where('subcate_id', $product->subcate_id)->where('id', '!=', $id)->where('status', 1)->where('is_deleted', 0)->paginate(3);
            return new ProductCollection($products);
        }
    }

    // save product search\
    public function saveProductSearch(Request $request)
    {
       
        $search = $request->input('searchdata');

        // return $product = Product::where('title','like','%'.$search.'%')->get();

        $search = SaveProduct::where('user_id', auth()->user()->id)->when(isset($search),function($q) use($search){
            $q->whereHas('product',function($q) use($search){
                $q->where('title','like','%'.$search.'%');
            })->with(['product'=>function($query) use($search){
                $query->where('title','like','%'.$search.'%');
            }]);
        })->get();
        return new SaveProductCollection($search);
    }

    // check Free Item
    public function checkFreeItem($id)
    {
        $product = Product::findOrFail($id);
        if($product->product_type == 2){
            return $product;
        }
    }
}
