<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($name = null, $sub_name = null)
    {
        if (!empty($name) && !empty($sub_name)) {
            $sub_category = Category::find($name)->sub->find($sub_name);

            return View::make('product.listing', [
                'sub_category' => $sub_category,
                'products' => Product::all(),
            ]);
        }

        if (!empty($name)) {
            $category = Category::find($name);

            return View::make('category.sub-categories', [
                'category' => $category,
                'sub_categories' => $category->sub,
            ]);
        }

        return View::make('category.categories', ['categories' => Category::all()]);
    }
}
