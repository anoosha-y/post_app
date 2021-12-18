<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // $posts= posts::all();
        // return view('post')->with('posts',$posts);
      //  return view('post');

      // to count the total number of posts uploaded. 
      $post = posts::where('user_id', auth()->id())->get();
      return(   $post);
              $postcount = $post::count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $posts= posts::all();
        // return view('create')->with('posts',$posts);
        return  view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filenamewithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/postimage', $fileNameToStore);

        $posts = new posts();
        $posts->name=$request->input('name');
        $posts->image=$fileNameToStore;
        $posts->user_id=auth()->user()->id;
        $posts->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Post Added'));

        //return redirect()->back(); //to go back to the same page
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = posts::find($id);
        return view('viewpost')->with('post',$post);
        // return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$name)
    {
        $post = posts::find($id);
        return view('editpost')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts)
    {
     

        if(file_exists($request->file('image'))){
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/postimage', $fileNameToStore);
            unlink(storage_path('app/public/postimage/'.$request->input('oldimage')));
        }else{
            
            $fileNameToStore= $request->input('oldimage');
        }

        $posts =  posts::find($request->input('id'));
        $posts->name=$request->input('name');
        $posts->image=$fileNameToStore;
        $posts->user_id=auth()->user()->id;
        $posts->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Post updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $name, $image)
    {
        $post = posts::find($id);
        $post->delete();
        unlink(storage_path('app/public/postimage/'.$image));

        $posts= posts::all();
        return view('create')->with('posts',$posts);  

        return redirect()->back()->with(session()->flash('alert-success', 'Post deleted'));
    }
}
