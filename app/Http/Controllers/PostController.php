<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.create-post', compact('posts', 'categories', 'tags'));
    }

    public function storePost(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:4|max:100',
            'text' => 'required|string',
        ]);

        $data['author'] = Auth::user()->name;
        $post = Post::make($data);

        $category = Category::findOrFail($request->get('category')); //'category' = nome della select nel form

        $tags = [];
        if($request -> has('tags'))
            $tags = Tag::findOrFail($request -> get('tags'));
      
        $post->category()->associate($category);
        $post->save();

        $post->tags()->attach($tags);
        $post->save();
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::findOrFail($id);

        return view('pages.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|min:4|max:100',
            'text' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($data);

        $category = Category::findOrFail($request->get('category'));
        $post->category()->associate($category);
        $post->save();

        $tags = [];
        try {
            $tags = Tag::findOrFail($request->get('tags'));
        } catch (\Exception $e) {
        };


        $post->tags()->sync($tags);
        $post->save();

        return redirect()->route('home');
    }

    public function delete (Request $request, $id) {
        $post = Post::findOrFail($id);
        $post -> tags() -> sync([]);
        $post -> save();
        $post -> delete();
        return redirect()->route('home'); 
    }


}
