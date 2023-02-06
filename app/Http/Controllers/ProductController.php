<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Product;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);

        return View::make('product.product', [
            'product' => $product,
            'sub_category_name' => $product->sub_category->name,
        ]);
    }
}
