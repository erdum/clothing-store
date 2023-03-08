<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Category;

class HomeController extends Controller
{
    public function index($category = null, $sub_category = null)
    {
        // if (!empty($name) && !empty($sub_name)) {
        //     $sub_category = Category::find($name)->sub->find($sub_name);

        //     return View::make('product.listing', [
        //         'sub_category' => $sub_category,
        //         'products' => Product::all(),
        //     ]);
        // }

        if (!empty($category)) {
            return View::make('layouts.categories', [
                'category' => Category::where('name', $category)->first()
            ]);
        }

        return View::make('layouts.index', ['categories' => Category::all()]);
    }

    public function terms()
    {
        return View::make('terms');
    }

    public function policy()
    {
        return View::make('policy');
    }
}
