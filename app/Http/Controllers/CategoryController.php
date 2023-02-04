<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function index($name = null, $sub_name = null)
    {
        if (!empty($sub_name)) {
            return View::make('product.listing', ['sub_category' => ((object) ['name' => 'Men']), 'products' => []]);
        }

        if (!empty($name)) {
            return View::make('category.sub-categories', ['category' => ((object) ['name' => 'Men']), 'sub_categories' => []]);
        }

        return View::make('category.categories', ['categories' => []]);
    }
}
