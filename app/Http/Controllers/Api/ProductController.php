<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReSubCategoryCollection;
use App\Http\Resources\SubCategoryCollection;
use App\Models\Category;
use App\Models\Product;
use App\Models\ReSubCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get category
    public function getCategores()
    {   
        return new ProductCategoryCollection(Category::where('status',1)->where('is_deleted',0)->get());
    }

    // get subcategory
    public function getSubCategores($id)
    {
        $cat = Category::where('slug',$id)->first();
        if($cat){
            return new SubCategoryCollection(SubCategory::where('cate_id',$cat->id)->where('status',1)->where('is_deleted',0)->get());
        }
        
    }

    // get resubcategory
    public function getReSubCategores($id,$subID)
    {
        $cat = Category::where('slug',$id)->first();
        $subcat = SubCategory::where('slug',$subID)->first();
        if($cat && $subcat){
            return new ReSubCategoryCollection(ReSubCategory::withCount('products')->where('cate_id',$cat->id)->where('subcate_id',$subcat->id)->where('status',1)->where('is_deleted',0)->get());
        }
        
    }

    // get product by ID
    public function getProductByID($cat,$subcat)
    {
        $category = Category::where('slug',$cat)->first();
        $subcat = SubCategory::where('slug',$subcat)->first();
        if($category && $subcat){
            $products=Product::where('cate_id',$category->id)->where('subcate_id',$subcat->id)->where('status',1)->where('is_deleted',0)->paginate(10);
           return new ProductCollection($products);
        }
    }

    // Get Single Product

    public function getSingleProduct($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    // Get Filter Product
    public function getFilterProduct(Request $request,$cat,$subcat)
    {
        
        $resubcat = $request->input('resubcat', []);
        $search = $request->search;

        $products = Product::when(isset($cat),function($q) use ($cat){
                $q->where('cat_slug',$cat);
        })->when(isset($subcat),function($q) use ($subcat){
            $q->where('subcat_slug',$subcat);
        })->when(count($resubcat),function($q) use ($resubcat){
            $q->whereIn('resubcate_id',$resubcat);
        })->when(isset($search),function($q) use($search){
            $q->where('title', 'like', '%' . $search . '%');
        })
        ->paginate(1);

        return new ProductCollection($products);
    }
}
