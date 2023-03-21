<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Category;

class HomeController extends Controller
{
    public function index($category = null, $sub_category = null)
    {
        if (!empty($category) && !empty($sub_category)) {
            $sub = Category::where('name', $category)->first()->sub->where('name', $sub_category)->first();

            return View::make('layouts.sub', [
                'sub' => $sub,
            ]);
        }

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

    public function contact()
    {
        return View::make('contact');
    }
}
