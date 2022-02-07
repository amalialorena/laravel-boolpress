<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class GuestController extends Controller
{
    public function posts() {
        $posts = Post::all();
        return view('pages.posts', compact('posts'));
    }
}
