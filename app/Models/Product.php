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

    public function scopeWithFilters($query, $resubcat, $search, $cat, $subcat)
    {

        return $query->when(isset($cat), function ($query) use ($cat) {
                    $query->where('cat_slug', $cat);
                })->when(isset($subcat),function($query) use ($subcat){
                    $query->where('subcat_slug', $subcat);
                })->when(count($resubcat), function ($query) use ($resubcat) {
                    $query->whereIn('resubcate_id', $resubcat);
                })->when(isset($search), function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
    }
}
