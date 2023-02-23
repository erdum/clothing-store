<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'extra_text',
        'cover_image',
    ];
}
