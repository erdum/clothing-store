<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Product;

class AdminPanelController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return View::make('admin-panel.products', ['products' => $products]);
    }

    public function edit_product($product_id)
    {
        $item = Product::find($product_id);

        if (empty($item)) {
            return response()->json(['message' => 'the requested item not found.'], 400);
        }

        return View::make('admin-panel.edit-product', ['product' => $item]);
    }

    public function save_product()
    {

    }

    public function categories()
    {}

    public function orders()
    {}

    public function users()
    {}

    public function site()
    {}
}
