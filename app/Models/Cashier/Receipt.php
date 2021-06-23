<?php

namespace App\Models\Cashier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Paddle\Subscription as CashierSubscription;

class Receipt extends CashierSubscription
{
    use HasFactory;
}
