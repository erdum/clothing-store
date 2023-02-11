<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($request->id) {
            $order = $user->orders->find($request->id);

            return View::make('order.order', []);
        }

        $orders = $user->orders;
        
        return View::make('order.index', ['orders' => $orders]);
    }
}
