<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Order;
use App\Models\Item;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->in_cart_items;

        $sub_total = $cart->sum(function($item) {
            return $item->quantity * $item->product->unit_price;
        });

        $countries_of_opreations = [
            'Pakistan',
            'UAE'
        ];

        $delivery_charges = env('DELIVERY_CHARGES');
        $taxes = env('TAX_CHARGES');
        $total = $sub_total + $delivery_charges + $taxes;

        return View::make('checkout.index', [
            'user' => Auth::user(),
            'cart' => $cart,
            'countries_of_opreations' => $countries_of_opreations,
            'delivery_charges' => $delivery_charges,
            'taxes' => $taxes,
            'sub_total' => $sub_total,
            'total' => $total
        ]);
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'max:30',
            'country' => 'required|max:30',
            'city' => 'required|max:30',
            'state' => 'max:30',
            'address' => 'required',
            'postal_code' => 'required|max:10',
            'phone_number' => 'required|max:20',
            'card_number' => 'max:30',
            'name_on_card' => 'max:30',
            'card_expiry' => 'max:30',
            'cvc' => 'max:10'
        ]);


        $user = Auth::user();
        $cart = $user->in_cart_items;
        $sub_total = $cart->sum(function($item) {
            return $item->quantity * $item->product->unit_price;
        });
        $delivery_charges = env('DELIVERY_CHARGES');
        $taxes = env('TAX_CHARGES');
        $total = $sub_total + $delivery_charges + $taxes;

        $user
        ->shipping_address()
        ->updateOrCreate(['user_id' => $user->id], [
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
            'card_number' => $request->card_number,
            'name_on_card' => $request->name_on_card,
            'card_expiry' => $request->card_expiry,
            'cvc' => $request->cvc
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'status_id' => 1,
            'shipping_address_id' => $user->shipping_address->id,
            'sub_total' => $sub_total,
            'total' => $total,
            'discount' => 0,
            'tax' => $taxes,
            'delivery_charges' => $delivery_charges,
            'payment_method' => $request->payment_method,
            'payment_id' => "N/A",
            'shipping_method' => $request->shipping_method,
            'shipping_eta' => "1-4 days"
        ]);

        foreach ($user->in_cart_items as $cart_item) {
            Item::create([
                'order_id' => $order->id,
                'product_id' => $cart_item->product->id,
                'color_id' => $cart_item->color->id,
                'size_id' => $cart_item->size->id,
                'quantity' => $cart_item->quantity
            ]);

            $cart_item->delete();
        }

        dd($user->orders);

        return View::make('checkout.checkout', [
            'action_url' => env('VERIFONE_CHECKOUT_URL'),
            'sid' => env('VERIFONE_MERCHANT_ID'),
            'user' => $user,
            'products' => $user->in_cart_items,
        ]);
    }
}
