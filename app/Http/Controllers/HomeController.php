<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

        // if (!empty($name)) {
        //     $category = Category::find($name);

        //     return View::make('category.sub-categories', [
        //         'category' => $category,
        //         'sub_categories' => $category->sub,
        //     ]);
        // }
        
        return View::make('layouts.master');
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
