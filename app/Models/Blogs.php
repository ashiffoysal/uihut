<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
    public function creadedby()
    {
        return $this->belongsTo(Admin::class,'created_by','id');
    }
}
