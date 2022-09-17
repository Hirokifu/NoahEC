<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name_jp',
        'brand_name_cn',
        'brand_slug_jp',
        'brand_slug_cn',
        'brand_image',
    ];
}
