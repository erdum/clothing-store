<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\Category;

class AdminPanelController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return View::make('admin-panel.products.index', ['products' => $products]);
    }

    public function add_product()
    {
        return View::make('admin-panel.products.add-product');
    }

    public function edit_product($product_id)
    {
        $item = Product::find($product_id);

        if (empty($item)) {
            return response()->json(['message' => 'the requested item not found.'], 400);
        }

        return View::make('admin-panel.products.edit-product', ['product' => $item]);
    }

    public function save_product()
    {

    }

    public function delete_product()
    {

    }


    // ------------ Categories Operations ------------
    // ===============================================
    public function categories()
    {
        $categories = Category::all();

        return View::make('admin-panel.category.index', ['categories' => $categories]);
    }

    public function add_category()
    {
        return View::make('admin-panel.category.add-category');
    }

    public function edit_category($category_id)
    {
        $category = Category::find($category_id);

        if (empty($category)) {
            return response()->json(['message' => 'the requested item for update not found.'], 400);
        }

        return View::make('admin-panel.category.edit-category', ['category' => $category]);
    }

    public function save_category(Request $request)
    {
        $rule = 'required|unique:categories';

        if ($request->category_id) $rule = 'required';
        
        $validated = Validator::make($request->all(), [
            'name' => $rule,
            'extra_text' => 'required',
        ]);

        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }

        Category::updateOrCreate(
            ['name' => trim($request->name)],
            ['extra_text' => $request->extra_text],
        );

        return redirect()->route('admin-categories');
    }

    public function delete_category($category_id)
    {
        $category = Category::find($category_id);

        if (empty($category)) {
            return response()->json(['message' => 'the requested item for delete not found.'], 400);
        }

        $category->delete();

        return redirect()->route('admin-categories');
    }

    public function orders()
    {}

    public function users()
    {}

    public function site()
    {}
}
    