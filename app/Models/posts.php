<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'image'
    ];

    function users() {
        return $this->belongsTo(User::class, 'user_id');  
    }

    function comments() {
        return $this->hasMany(comment::class);  
    } 

    function likes() {
        return $this->hasMany(like::class);  
    }
}
