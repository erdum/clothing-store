<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SiteSetting;

use Tco\TwocheckoutFacade;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->in_cart_items;
        $site = SiteSetting::first();

        $sub_total = $cart->sum(function($item) {
            return $item->quantity * $item->product->unit_price;
        });

        $countries_of_opreations = [
            'Pakistan',
            'UAE'
        ];

        $currencies = [
            'Pakistan' => 'Rs.',
            'UAE' => 'AED.'
        ];

        $delivery_charges = $site?->delivery_charges;
        $taxes = $site?->tax_charges;
        $discount = $site?->discount;
        $discount_text = $site?->discount_text;
        $total = ($sub_total - (($discount / 100) * $sub_total)) + $delivery_charges + $taxes;

        return View::make('checkout.index', [
            'user' => Auth::user(),
            'cart' => $cart,
            'countries_of_opreations' => $countries_of_opreations,
            'delivery_charges' => $delivery_charges,
            'taxes' => $taxes,
            'discount' => $discount,
            'discount_text' => $discount_text,
            'iban' => $site?->iban,
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
            'payment_method' => 'required',
            'card_number' => 'max:30',
            'name_on_card' => 'max:30',
            'card_expiry' => 'max:30',
            'cvc' => 'max:10',
            'tid' => 'max:30'
        ]);

        $user = Auth::user();
        $site = SiteSetting::first();
        $cart = $user->in_cart_items;
        $sub_total = $cart->sum(function($item) {
            return $item->quantity * $item->product->unit_price;
        });
        $delivery_charges = $site->delivery_charges ?? 0;
        $taxes = $site->tax_charges ?? 0;
        $discount = $site->discount ?? 0;
        $discount_text = $site->discount_text ?? '';
        $total = ($sub_total - (($discount / 100) * $sub_total)) + $delivery_charges + $taxes;

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

        if ($request->payment_method == 'credit_card') {
            // Process third party payment
        }

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'Pending',
            'shipping_address_id' => $user->shipping_address->id,
            'sub_total' => $sub_total,
            'total' => $total,
            'discount' => $discount,
            'discount_text' => $discount_text,
            'tax' => $taxes,
            'delivery_charges' => $delivery_charges,
            'payment_method' => $request->payment_method,
            'payment_id' => $request?->tid ?? "N/A",
            'shipping_method' => $request->shipping_method,
            'shipping_eta' => "1-4 days",
            'tracking_id' => "N/A"
        ]);

        foreach ($user->in_cart_items as $cart_item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart_item->product->id,
                'product_color_id' => $cart_item->color->id,
                'product_size_id' => $cart_item->size->id,
                'quantity' => $cart_item->quantity
            ]);

            $cart_item->delete();
        }

        dd($user->orders);
    }
}
