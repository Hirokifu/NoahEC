<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
