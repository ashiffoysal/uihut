<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cashier\Subscription;



class SubcriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $allsub=Subscription::orderBy('id','DESC')->get();
    
        return view('backend.subcription.allsubcripton',compact('allsub'));
    }
}
