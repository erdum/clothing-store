<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Order;
use App\Models\SiteSetting;
use App\Models\UserQuery;

class AdminPanelController extends Controller
{

    // ------------ Product Operations ------------
    // ===============================================
    public function index()
    {
        $products = Product::all();

        return View::make('admin-panel.products.index', ['products' => $products]);
    }

    public function add_product()
    {
        return View::make('admin-panel.products.add-product', ['categories' => Category::all(), 'sub_categories' => SubCategory::all()]);
    }

    public function edit_product($product_id)
    {
        $item = Product::find($product_id);

        if (empty($item)) {
            return response()->json(['message' => 'the requested item not found.'], 400);
        }

        return View::make('admin-panel.products.edit-product', [
            'product' => $item,
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all()
        ]);
    }

    public function save_product(Request $request)
    {
        if (!$request->product_id) {
            $validated = Validator::make($request->all(), [
                'sub_category_id' => 'required',
                'name' => 'required|max:30',
                'description' => 'required|max:60',
                'details' => 'required',
                'unit_price' => 'required|numeric',
                'discount' => 'required|numeric',
                'quantity' => 'required|numeric',
                'color_names' => 'required|array',
                'color_values' => 'required|array',
                'sizes' => 'required|array',
                'product_images' => 'required|array',
            ]);

            if ($validated->fails()) {
                return back()->withErrors($validated)->withInput();
            }
        }

        $product = Product::updateOrCreate(
            ['id' => $request->product_id],
            [
                'sub_category_id' => $request->sub_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'details' => $request->details,
                'unit_price' => $request->unit_price,
                'discount' => $request->discount,
                'quantity' => $request->quantity,
            ]
        );

        $product->update_or_insert_colors($request->color_names ?? [], $request->color_values ?? []);
        $product->update_or_insert_sizes($request->sizes ?? []);

        if ($request->product_id) {
            $new_images = [];
            $existing_images = [];

            foreach ($request->product_images as $image) {

                if ($product->images()->where('url', $image)->count() == 0) {
                    array_push($new_images, $image);
                } else {
                    array_push($existing_images, $image);
                }
            }
            $new_images = save_base64_to_webp($new_images);
            $product->update_or_insert_images(array_merge($existing_images, $new_images));
        } else {
            $product->update_or_insert_images(save_base64_to_webp($request->product_images));
        }

        return redirect()->route('admin-panel');
    }

    public function delete_product($product_id)
    {
        $product = Product::find($product_id);

        if (empty($product)) {
            return response()->json(['message' => 'the requested item for delete not found.'], 400);
        }

        $product->delete();

        return redirect()->route('admin-panel');
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
            ['id' => $request->category_id],
            ['name' => trim($request->name), 'extra_text' => trim($request->extra_text)],
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


    // ------------ Sub Categories Operations ------------
    // ===============================================
    public function sub_categories()
    {
        $sub_categories = SubCategory::all();

        return View::make('admin-panel.sub-category.index', ['sub_categories' => $sub_categories]);
    }

    public function add_sub_category()
    {
        return View::make('admin-panel.sub-category.add-sub-category', ['categories' => Category::all()]);
    }

    public function edit_sub_category($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);

        if (empty($sub_category)) {
            return response()->json(['message' => 'the requested item for update not found.'], 400);
        }

        return View::make('admin-panel.sub-category.edit-sub-category', ['sub_category' => $sub_category, 'categories' => Category::all()]);
    }

    public function save_sub_category(Request $request)
    {
        $rule = Rule::unique('sub_categories')->where(function ($query) use ($request) {
            return $query->where('category_id', $request->category_id);
        });

        if ($request->sub_category_id) $rule = 'required';
        
        $validated = Validator::make($request->all(), [
            'name' => $rule,
            'extra_text' => 'required',
            'category_id' => 'required',
        ]);

        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }

        SubCategory::updateOrCreate(
            ['id' => $request->sub_category_id],
            ['extra_text' => trim($request->extra_text), 'name' => trim($request->name), 'category_id' => $request->category_id],
        );

        return redirect()->route('admin-sub-categories');
    }

    public function delete_sub_category($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);

        if (empty($sub_category)) {
            return response()->json(['message' => 'the requested item for delete not found.'], 400);
        }

        $sub_category->delete();

        return redirect()->route('admin-sub-categories');
    }

    // ------------ Orders Operations ------------
    // ===============================================
    public function orders()
    {
        return View::make('admin-panel.orders.index', ['orders' => Order::all()]);
    }

    public function edit_order($order_id)
    {
        $order = Order::find($order_id);

        if (empty($order)) {
            return response()->json(['message' => 'the requested item for update not found.'], 400);
        }
        $discounted_total = $order->sub_total - ($order->sub_total * ($order->discount / 100));
        $total = $discounted_total + ($discounted_total * ($order->tax / 100));

        $order_statuses = [
            'Canceled',
            'Pending',
            'Confirmed',
            'Dispatched',
            'Delivered'
        ];

        return View::make('admin-panel.orders.order', [
            'order' => $order,
            'discounted_total' => $discounted_total,
            'currency' => SiteSetting::first()->currency,
            'order_statuses' => $order_statuses
        ]);
    }

    public function save_order(Request $request)
    {
        $order = Order::find($request->order_id);

        if (empty($order)) {
            return response()->json(['message' => 'the requested item for update not found.'], 400);
        }

        $order->status = $request->order_status;
        $order->tracking_id = $request->tracking_id;
        $order->save();

        return redirect()->route('edit-order', ['order_id' => $order->id]);
    }

    public function users()
    {}

    // ------------ Site Operations ------------
    // ===============================================
    public function site()
    {
        return View::make('admin-panel.site.index', SiteSetting::first() ?? []);
    }

    public function save_site_settings(Request $request)
    {
        $methods = [];

        if (isset($request->shipping_method_name)) {

            foreach ($request->shipping_method_name as $index => $value) {
                array_push($methods, [
                    'name' => $value,
                    'charges' => $request->shipping_method_charges[$index],
                    'eta' => $request->shipping_method_eta[$index]
                ]);
            }
        }

        if (!empty($request->file('site_logo'))) {
            $logo_name = save_img_to_webp($request->file('site_logo'), $request->file('site_logo')->extension());
        }
        $settings = SiteSetting::updateOrCreate(
            ['id' => 1],
            array_merge(
                $request->all(),
                [
                    'shipping_methods' => json_encode($methods),
                    'logo' => $logo_name ?? SiteSetting::first()->logo ?? ''
                ]
            )
        );

        return View::make('admin-panel.site.index', $settings ?? []);
    }

    public function save_customer_query(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $query = new UserQuery();
        $query->name = $request->name;
        $query->email = $request;
    }
}
    