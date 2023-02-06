<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sub_total = $user->in_cart_items()->withSum('product', 'total')->product_sum_total;
        $delivery_charges = 300;
        $total = $sub_total + $delivery_charges;

        return View::make('checkout.index', [
            'user' => $user,
            'sub_total' => $sub_total,
            'delivery_charges' => $delivery_charges,
            'total' => $total,
        ]);
    }

    public function checkout()
    {
        return 'Checkout';
    }
}
