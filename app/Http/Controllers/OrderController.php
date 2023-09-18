<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $user = $request->user();

        if (!empty($id)) {
            $order = $user->orders->find($request->id);

            $discounted_total = $order->sub_total - ($order->sub_total * ($order->discount / 100));
            $total = $discounted_total + ($discounted_total * ($order->tax / 100));

            return View::make('order.order', ['order' => $order, 'discounted_total' => $discounted_total]);
        }

        return View::make('order.index', ['orders' => $user->orders]);
    }
}
