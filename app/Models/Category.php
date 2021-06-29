<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
  
    public function subcategory()
    {
        return $this->hasOne('App\Models\SubCategory','cate_id')->where('is_deleted',0)->where('status',1);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'cate_id','id');
    }
   
}
