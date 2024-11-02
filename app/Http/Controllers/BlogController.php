<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Mengambil semua post dari database
        return view('pages.blog.index', compact('posts')); // Kirim data ke view
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // Mencari postingan berdasarkan slug
        return view('pages.blog.show', compact('post'));
    }
}

