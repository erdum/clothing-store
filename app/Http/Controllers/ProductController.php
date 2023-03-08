<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Product;

class ProductController extends Controller
{
    public function index($id)
    {
        return View::make('product.index', ['product' => Product::find($id)]);
    }
}
