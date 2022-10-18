<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    public $fillable= ['admin_id','user_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
