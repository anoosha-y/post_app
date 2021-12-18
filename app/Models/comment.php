<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'user_id',
        'post_id'
    ];

    function users() {
        return $this->belongsTo(User::class, 'user_id');  
    }

    // function users() {
    //     return $this->hasMany(Comment::class, 'user_id');  
    // }

}
