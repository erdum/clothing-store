<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckoutController extends Controller
{
    public function index()
    {
        return View::make('checkout.index', [

        ]);
    }

    public function checkout()
    {
        return 'Checkout';
    }
}
