<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_text',
        'discount',
        'delivery_charges',
        'tax_charges',
        'currency_multiplier',
        'iban',
        'address',
        'phone',
        'email',
        'instagram',
        'facebook'
    ];
}
