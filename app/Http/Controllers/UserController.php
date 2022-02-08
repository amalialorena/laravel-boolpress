<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost(){
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('pages.create-post', compact('posts'));
    }

    public function storePost(Request $request) {

        $data = $request -> validate([
            'title' => 'string|min:4|max:100',
            'text' => 'string|required'
        ]);
        $data['author'] = Auth::user() -> name;
        $post = Post::create($data);
        return redirect() -> route('/post/store');
    }
}