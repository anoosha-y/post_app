<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'like',
        'user_id',
        'post_id'
    ];

    function users() {
        return $this->belongsTo(User::class, 'user_id');  
    }

    // function post() {
    //     return $this->belongsTo(Posts::class, 'post_id');  
    // }

}
