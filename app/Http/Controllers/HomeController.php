<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $posts = Post::all();
        return view('pages.home', compact('posts'));
    }

    public function createPost(){
        return view('pages.create-post');
    }

    public function storePost(Request $request){

        $data = $request -> validate([
            'title'=>'request|string|min:4|max:100',
            'text'=>'string|request',
        ]);
        $data['author'] = Auth::user()->name;
        $post= Post::create($data);
        return redirect() -> route('home');
    }
   
}
