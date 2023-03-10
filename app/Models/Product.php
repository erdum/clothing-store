<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sub;
use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
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
        return $this->belongsTo(Sub::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
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
