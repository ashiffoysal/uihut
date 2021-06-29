<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerCollection;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\ClientReviewCollection;
use App\Http\Resources\ExploreCollection;
use App\Http\Resources\HeaderSubCategoryResource;
use App\Http\Resources\PackageCollection;
use App\Models\Category;
use App\Models\ClientReview;
use App\Models\Explore;
use App\Models\HomeFirstSection;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    // Show Site Home section Banner

    public function showBanner()
    {
        return new BannerCollection(HomeFirstSection::all());
    }

    // Show categoryes

    public function showCategores()
    {
        return new CategoryCollection(Category::with('products')->where('status',1)->where('is_deleted',0)->get());
    }

    // Show Explores
    
    public function showExplores()
    {
        return new ExploreCollection(Explore::where('status',1)->where('is_deleted',0)->get());
    }

    // Show Client Review
    public function showClientReview()
    {
        return new ClientReviewCollection(ClientReview::where('status',1)->where('is_deleted',0)->get());
    }

    // show price
    public function showPrice()
    {
        return new PackageCollection(Package::where('status',1)->where('is_deleted',0)->get());
    }

    //Get Header Category and Sub Category
    public function getHeaderSubCategory()
    {
        return new HeaderSubCategoryResource(Category::with('subcategory')->where('status',1)->where('is_deleted',0)->first());
    }

  

}
