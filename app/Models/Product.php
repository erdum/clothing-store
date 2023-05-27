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
        'sub_id',
        'name',
        'description',
        'unit_price',
        'discount',
        'quantity'
    ];

    public function sub()
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
}
