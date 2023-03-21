<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use App\Models\Site;

use Tco\TwocheckoutFacade;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->in_cart_items;
        $site = Site::first();

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

        $delivery_charges = $site->delivery_charges;
        $taxes = $site->tax_charges;
        $discount = $site->discount;
        $discount_text = $site->discount_text;
        $total = ($sub_total - (($discount / 100) * $sub_total)) + $delivery_charges + $taxes;

        return View::make('checkout.index', [
            'user' => Auth::user(),
            'cart' => $cart,
            'countries_of_opreations' => $countries_of_opreations,
            'delivery_charges' => $delivery_charges,
            'taxes' => $taxes,
            'discount' => $discount,
            'discount_text' => $discount_text,
            'iban' => $site->iban,
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
        $discount = env('DISCOUNT_PERCENTAGE');
        $discount_text = env('DISCOUNT_TEXT');
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

        // $dynamicOrderParams = array(
        //     'Country'           => 'PK',
        //     'Currency'          => 'PKR',
        //     'CustomerIP'        => '91.220.121.21',
        //     'ExternalReference' => 'CustOrd101',
        //     'Language'          => 'en',
        //     'Source'            => 'tcolib.local',
        //     'BillingDetails'    =>
        //         array(
        //             'Address1'    => 'Street 1',
        //             'City'        => 'Karachi',
        //             'State'       => 'Sindh',
        //             'CountryCode' => 'PK',
        //             'Email'       => 'testcustomer@2Checkout.com',
        //             'FirstName'   => 'John',
        //             'LastName'    => 'Doe',
        //             'Zip'         => '75850',
        //         ),
        //     'Items'             =>
        //         array(
        //             0 =>
        //                 array(
        //                     'Name'         => 'Dynamic product2',
        //                     'Description'  => 'Product 2',
        //                     'Quantity'     => 3, //units
        //                     'IsDynamic'    => true,
        //                     'Tangible'     => false,
        //                     'PurchaseType' => 'PRODUCT',
        //                     'Price'        =>
        //                         array(
        //                             'Amount' => 6, //value
        //                             'Type'   => 'CUSTOM',
        //                         ),
        //                 )
        //         ),
        //     'PaymentDetails'    =>
        //         array(
        //             'Type'          => 'TEST', //'TEST' or 'EES_TOKEN_PAYMENT'
        //             'Currency'      => 'PKR',
        //             'CustomerIP'    => '91.220.121.21',
        //             'PaymentMethod' =>
        //                 array(
        //                     'RecurringEnabled' => false,
        //                     'HolderNameTime'   => 1,
        //                     'CardNumberTime'   => 1,
        //                 ),
        //         ),
        // );

        // $tco = new TwocheckoutFacade([
        //     'sellerId'      => env('VERIFONE_MERCHANT_CODE'),
        //     'secretKey'     => env('VERIFONE_SECRET_KEY'),
        //     'buyLinkSecretWord'    => env('VERIFONE_SECRET_WORD'),
        //     'jwtExpireTime' => 30,
        //     'curlVerifySsl' => 1
        // ]);
        // $order = $tco->order();
        // $response = $order->place($dynamicOrderParams);

        $order = Order::create([
            'user_id' => $user->id,
            'status_id' => 1,
            'shipping_address_id' => $user->shipping_address->id,
            'sub_total' => $sub_total,
            'total' => $total,
            'discount' => $discount,
            'discount_text' => $discount_text,
            'tax' => $taxes,
            'delivery_charges' => $delivery_charges,
            'payment_method' => $request->payment_method,
            'payment_id' => "N/A",
            'shipping_method' => $request->shipping_method,
            'shipping_eta' => "1-4 days",
            'tracking_id' => "N/A"
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
