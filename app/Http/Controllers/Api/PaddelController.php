<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Paddle\Cashier;

class PaddelController extends Controller
{
    public function showPaddlePayLink()
    {
        $user = user::find(41);
        $sub=13190;
        $payLink = $user->newSubscription('default', $premium = $sub)
        ->returnTo(route('home.frontend'))
        ->create();
        return response()->json($payLink);
        // return view('ajax.paddle_link', ['payLink' => $payLink]);
    }
}
