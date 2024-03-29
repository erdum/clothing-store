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
    public function index(Request $request)
    {
        $cart = Auth::user()->in_cart_items;
        $site = SiteSetting::first();

        $sub_total = $cart->sum(function($item) {
            return ($item->quantity * $item->product->unit_price) - (($item->quantity * $item->product->unit_price) * ($item->product->discount / 100));
        });

        $countries_of_opreations = [
            'Pakistan',
            'UAE'
        ];

        $discounted_total = $sub_total - ($sub_total * ($site->discount_percentage ?? 0 / 100));
        $total = $discounted_total + ($discounted_total * ($site->tax ?? 0 / 100));

        return View::make('checkout.index', [
            'user' => Auth::user(),
            'cart' => $cart,
            'currency' => $site->currency ?? '$',
            'shipping_methods' => $site?->shipping_methods() ?? [],
            'tax' => $site->tax ?? 0,
            'discount' => $site->discount_percentage ?? '',
            'discount_text' => $site->discount_text ?? '',
            'countries_of_opreations' => $countries_of_opreations,
            'iban' => $site->iban ?? '',
            'sub_total' => $sub_total,
            'discounted_total' => $discounted_total,
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
            'shipping_method' => 'required',
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
            return ($item->quantity * $item->product->unit_price) - ($item->quantity * $item->product->unit_price) * ($item->product->discount / 100);
        });

        $shipping = array_reduce($site->shipping_methods(), function ($carry, $item) use ($request) {

            if (in_array($request->shipping_method, ((array) $item))) {
                return $item;
            } else {
                return $carry;
            }
        });

        $total = $sub_total - ($sub_total * ($site->discount_percentage / 100));
        $total += ($total * ($site->tax / 100));
        $total += $shipping->charges;

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
            'discount' => $site->discount_percentage,
            'discount_text' => $site->discount_text,
            'tax' => $site->tax,
            'delivery_charges' => $shipping->charges,
            'payment_method' => $request->payment_method,
            'payment_id' => $request?->tid ?? "N/A",
            'shipping_method' => $shipping->name,
            'shipping_eta' => $shipping->eta,
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

            $cart_item->product->quantity -= $cart_item->quantity;
            $cart_item->product->save();

            $cart_item->delete();
        }

        return redirect()->route('order', ['id' => $order->id]);
    }
}
