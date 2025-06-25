<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    protected $fillable = [
        'title',
        'brand',
        'size',
        'price',
        'image_url',
        'is_new',
    ];
}
