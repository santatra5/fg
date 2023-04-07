<?php

namespace App\Http\Controllers;
use Stripe\Charge;
use Stripe\Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(){
        return view('welcome');

    }
    public function checkout(){
        Stripe::setApiKey(config('services.stripe.secret'));

    }
    public function success(){
        return view('welcome');
    }
}
