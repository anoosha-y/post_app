<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = posts::all();
        // // $users = user::all();
        // // return ($posts);
      //  $posts = posts::where('user_id', auth()->id())->get();
         return view('home')->with('posts', $posts);
    }
}
