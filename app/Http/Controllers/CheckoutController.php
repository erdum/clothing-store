<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->in_cart_items;

        $sub_total = $cart->sum(function($item) {
            return $item->quantity * $item->product->unit_price;
        });

        $delivery_charges = env('DELIVERY_CHARGES');
        $taxes = env('TAX_CHARGES');
        $total = $sub_total + $delivery_charges + $taxes;

        return View::make('checkout.index', [
            'cart' => $cart,
            'delivery_charges' => $delivery_charges,
            'taxes' => $taxes,
            'sub_total' => $sub_total,
            'total' => $total
        ]);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'max:30',
            'country' => 'required|max:30',
            'city' => 'required|max:30',
            'state' => 'required|max:30',
            'address' => 'required',
            'postal_code' => 'required|max:10',
            'email' => 'email',
            'phone_number' => 'required|max:20',
        ]);

        $user->shipping_address()->updateOrCreate(['user_id' => $user->id], [
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
        ]);

        return View::make('checkout.checkout', [
            'action_url' => env('VERIFONE_CHECKOUT_URL'),
            'sid' => env('VERIFONE_MERCHANT_ID'),
            'user' => $user,
            'products' => $user->in_cart_items,
        ]);
    }
}
