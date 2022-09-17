<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inquiry(){
        return $this->belongsTo(Inquiry::class,'inquiry_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}