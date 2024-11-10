<?php
namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Method untuk menampilkan daftar tulisan
    public function index()
    {
        // Ambil semua tulisan dari database
        $posts = Post::all();
        
        // Mengarahkan ke view daftar tulisan dengan data tulisan
        return view('pages.posts.index', compact('posts'));
    }
    
    // Method untuk menampilkan detail tulisan
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // Mengambil post berdasarkan slug
        return view('pages.posts.show', compact('post')); // Mengirim data post ke view
    }
    
    // Menampilkan form untuk membuat postingan baru
        public function create()
    {
        return view('pages.posts.create');
    }

    // Menyimpan postingan baru ke database
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:posts',
        'content' => 'required',
        'author' => 'required|string|max:100',
    ]);

    // Menyimpan data ke database
    Post::create($request->all());

    // Redirect setelah menyimpan
    return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat!');
}


    // Menampilkan form untuk mengedit postingan
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // Mengambil postingan berdasarkan slug
        return view('pages.posts.edit', compact('post')); // Pastikan Anda memiliki view ini
    }

    // Memperbarui postingan yang sudah ada
    public function update(Request $request, $slug)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $slug . ',slug',
            'content' => 'required',
            'author' => 'required|string|max:100',
        ]);

        // Mencari postingan berdasarkan slug dan memperbarui data
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->update($request->all());

        // Redirect setelah memperbarui
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat!');
    }

    // Method untuk menghapus posts
    public function destroy($id)
    {
        // Ambil posts berdasarkan ID
        $post = Post::findOrFail($id);

        // Hapus posts dari database
        $post->delete();

        // Redirect ke daftar posts dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Tulisan berhasil dihapus!');
    }
}
