<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SubCategory;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\OrderItem;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'name',
        'description',
        'details',
        'unit_price',
        'discount',
        'quantity'
    ];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderItem::class)->order();
    }

    public function in_carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function update_or_insert_colors($colors_names, $colors_values)
    {
        ProductColor::where('product_id', $this->id)->delete();

        $new_colors = [];

        foreach ($colors_names as $index => $color_name) {
            array_push($new_colors, [
                'name' => $color_name,
                'value' => $colors_values[$index]
            ]);
        }

        $this->colors()->createMany($new_colors);
    }

    public function update_or_insert_sizes($sizes)
    {
        ProductSize::where('product_id', $this->id)->delete();

        $new_sizes = [];

        foreach ($sizes as $size) {
            array_push($new_sizes, [
                'name' => $size
            ]);
        }

        $this->sizes()->createMany($new_sizes);
    }

    public function update_or_insert_images($images)
    {
        ProductImage::where('product_id', $this->id)->delete();

        $new_images = [];

        foreach ($images as $image) {
            array_push($new_images, [
                'url' => $image
            ]);
        }

        $this->images()->createMany($new_images);
    }
}
