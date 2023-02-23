<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sub;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'extra_text',
        'cover_image',
    ];

    public function sub()
    {
        return $this->hasMany(Sub::class);
    }
}
