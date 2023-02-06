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
        $user = Auth::user();
        $sub_total = $user->in_cart_items->sum(function ($item) {
            return ($item->quantity * $item->product->unit_price);
        });
        $delivery_charges = 300;
        $total = $sub_total + $delivery_charges;

        return View::make('checkout.index', [
            'user' => $user,
            'sub_total' => $sub_total,
            'delivery_charges' => $delivery_charges,
            'total' => $total,
        ]);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'max:30',
            'country' => 'required|max:30',
            'city' => 'required|max:30',
            'address' => 'required',
            'postal_code' => 'required|max:10',
            'email' => 'email',
            'phone_number' => 'required|max:20',
        ]);

        $user->shipping_address()->updateOrCreate(['user_id' => $user->id], [
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
        ]);

        return redirect('/pay');
    }
}
