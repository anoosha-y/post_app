<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = posts::all(); 
         return view('home')->with('posts', $posts);
    }
}
