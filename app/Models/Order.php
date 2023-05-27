<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\OrderStatus;
use App\Models\ShippingAddress;
use App\Models\CartItem;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'shipping_address_id',
        'sub_total',
        'total',
        'discount',
        'discount_text',
        'tax',
        'delivery_charges',
        'payment_method',
        'payment_id',
        'shipping_method',
        'shipping_eta',
        'tracking_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
