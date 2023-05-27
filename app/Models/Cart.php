<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'color_id',
        'size_id',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
