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
            return View::make('order.order', ['order' => $user->orders->find($request->id)]);
        }

        return View::make('order.index', ['orders' => $user->orders]);
    }
}
