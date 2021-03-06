<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('guest.posts.index', compact('posts'));
    }
    public function show($slug) {
        // where è simile a find solo che find prende l'id invece con where puoi usare tutti gli altri parametri
        $post = Post::where('slug', $slug)->first();
        return view('guest.posts.show', compact('post'));
    }
}
