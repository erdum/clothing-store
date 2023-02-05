<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckoutController extends Controller
{
    public function index()
    {
        return View::make('checkout.index', [
            'user' => null,
            'sub_total' => 0,
            'delivery_charges' => 0,
            'total' => 0,
        ]);
    }

    public function checkout()
    {
        return 'Checkout';
    }
}
