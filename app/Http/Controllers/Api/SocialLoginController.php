<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function facebookLogin(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        return $token = $user->token;
    }
}
