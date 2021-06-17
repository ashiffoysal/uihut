<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Resources\GeneralResource;
use App\Models\Social;

class LogoController extends Controller
{
    public function Logo(){
         return new GeneralResource(GeneralSetting::first());
    }
    // social link
    public function social(){
        $data=Social::first();
        return response()->json($data);
    }
}
