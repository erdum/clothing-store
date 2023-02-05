<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function index($id)
    {
        return View::make('product.product', ['product' => ((object) [
            'name' => 'Jeans',
            'unit_price' => 30,
            'description' => 'lorem ipsum doler sit asdf kasdfa kjlda io lsadf.',
            'quantity' => 21,
            'images' => [],
            'sizes' => [],
        ]), 'sub_category_name' => 'Men']);
    }
}
