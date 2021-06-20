<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cate_id', 'id');
    }

    public function reSubCategores()
    {
        return $this->belongsTo('App\Models\ReSubCategory', 'resubcate_id', 'id');
    }
}
