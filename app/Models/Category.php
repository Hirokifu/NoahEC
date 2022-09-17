<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_jp',
        'category_name_cn',
        'category_slug_jp',
        'category_slug_cn',
        'category_icon',
    ];
}
