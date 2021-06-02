<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pixefy extends Model
{
    use HasFactory;
    public function topic()
    {
        return $this->belongsTo(PixefyTopic::class);
    }
    public function creadedby()
    {
        return $this->belongsTo(Admin::class,'created_by','id');
    }
}
