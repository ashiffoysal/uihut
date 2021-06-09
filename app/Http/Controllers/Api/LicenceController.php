<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
    public function index(){
        $license=License::first();
        return response()->json($license);
    }
}
