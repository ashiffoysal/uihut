<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\EmailVarification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_name'=>'required|max:255|unique:users',
            'fullname'=>'required|max:255',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|unique:users',
        ]);


        $user = new User();
        $user->full_name = $request->fullname;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->varify_token = rand(11111,99999);
        $user->is_varify = 0;
        $user->save();
        
        $email = $request->email;
        Mail::to($email)->send(new EmailVarification($user->fullname,$user->email,$user->varify_token));
        return response()->json([
            'email'=>\Crypt::encrypt($user->email),
            'id'=>$user->id,
        ]);
    } 
    
    // varify email

    public function emailVarify(Request $request)
    {
        
        $request->validate([
            'code'=>'required',
        ],
        [
            'code.required'=>'Varify Code is Require',
        ]
    );

        $email = \Crypt::decrypt($request->email);
        $user = User::where('id',$request->id)->where('email',$email)->where('varify_token',$request->code)->first();
        if($user){
            $user->varify_token = null;
            $user->is_varify = 1;
            $user->save();
            return response()->json([
                'message' => 'Registration Successful. Please log in to your account'
            ], 201);
        }else{
            return response()->json([
                'error'=>'User Information Mismatch!'
            ],422);
        }
    }

    // login 

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_varify'=>1]))
            return response()->json(['message' => 'Invalid Email or password'], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        return $this->loginSuccess($tokenResult, $user); 
    }

    // user

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    // login success data

    protected function loginSuccess($tokenResult, $user)
    {
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(100);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user' => [
                'id' => $user->id,
                'fullname' => $user->fullname,
                'user_name' => $user->user_name,
                'email' => $user->email,
            ]
        ]);
    }
    // 

}
