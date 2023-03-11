<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
    public function update(Request $request)
    {
        $request->validate(['action' => 'required']);

        if ($request->action == 'add') {

            $request->validate([
                'product_id' => 'required',
                'color_id' => 'required',
                'size_id' => 'required',
                'quantity' => 'required'
            ]);

            Cart::create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity
            ]);

            return response()->json(['message' => 'success'], 200);
        }

        if ($request->action == 'remove') {

            $request->validate(['product_id' => 'required']);
            
            $item = Cart::find($request->product_id);

            if (empty($item)) {
                return response()->json(['message' => 'missing parameter product_id required for removing item.'], 400);
            }

            $item->delete();
        }
    }
}
