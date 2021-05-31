<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
  public function loginfrom()
  {
    return view('backend.login.login');
  }

  public function login(Request $request)
  {
    // Validate the form data
    $this->validate($request, [
      'email'   => 'required',
      'password' => 'required|min:6'
    ]);
    // Attempt to log the user in
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
      $notification = array(
        'messege' => 'Login success!',
        'alert-type' => 'success'
      );
      return redirect()->intended(route('admin.dashboard'))->with($notification);
    }else{
      $notification = array(
        'messege' => 'Email/password Doesnot Match!',
        'alert-type' => 'error'
      );
      return redirect()->back()->with($notification);
    }
  }
}
