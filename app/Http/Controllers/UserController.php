<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost(){
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $categories = Category::all(); 
        return view('pages.create-post', compact('posts', 'categories'));
    }

    public function storePost(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|min:4|max:100',
            'text' => 'required|string',
        ]);

        $data['author'] = Auth::user() -> name;
        $post = Post::make($data); 
        $category = Category::findOrFail($request -> get('category'));
        $post -> category() ->associate($category);
        $post -> save();
        return redirect() -> route('home');
    }

    
}
