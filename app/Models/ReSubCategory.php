<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReSubCategory extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasOne('App\Models\Category','id','cate_id');
    }
    public function subcategory()
    {
        return $this->hasOne('App\Models\SubCategory','id','subcate_id');
    }
}
