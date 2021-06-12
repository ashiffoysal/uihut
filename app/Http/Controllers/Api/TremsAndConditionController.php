<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TremsAndConditionController extends Controller
{
    public function index(){
        $terms=TermsAndCondition::first();
        return response()->json($terms);
    }
    // 
    public function social(){
        $social=Social::first();
        return response()->json($social);
    }
}
