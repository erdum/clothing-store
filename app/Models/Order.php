<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\ShippingAddress;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'status',
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

    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
