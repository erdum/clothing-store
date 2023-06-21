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

            $item = Cart::where('user_id', $request->user()->id)
                ->where('product_id', $request->product_id)
                ->where('color_id', $request->color_id)
                ->where('size_id', $request->size_id)
                ->first();

            if (empty($item)) {
                
                Cart::create([
                    'user_id' => $request->user()->id,
                    'product_id' => $request->product_id,
                    'product_color_id' => $request->color_id,
                    'product_size_id' => $request->size_id,
                    'quantity' => $request->quantity
                ]);
            } else {
                $item->quantity++;
                $item->save();
            }

            return response()->json(['message' => 'success'], 200);
        }

        if ($request->action == 'remove') {

            $request->validate(['id' => 'required']);
            
            $item = Cart::find($request->id);

            if (empty($item)) {
                return response()->json(['message' => 'the requested item for delete not found.'], 400);
            }

            $item->delete();

            return response()->json(['message' => 'success'], 200);
        }

        if ($request->action == 'update') {

            $request->validate([
                'id' => 'required',
                'quantity' => 'required'
            ]);

            $item = Cart::find($request->id);

            if (empty($item)) {
                return response()->json(['message' => 'the requested item for update not found.'], 400);
            }

            $item->quantity = $request->quantity;
            $item->save();
            
            return response()->json(['message' => 'success'], 200);
        }
    }
}
