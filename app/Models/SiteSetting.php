<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'logo',
        'contact_email',
        'contact_phone',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'terms',
        'privacy_policy',
        'discount_text',
        'discount_percentage',
        'tax',
        'currency',
        'iban',
        'stripe_secret',
        'stripe_key'
    ];
}
