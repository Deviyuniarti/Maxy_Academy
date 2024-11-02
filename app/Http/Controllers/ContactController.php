<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller 
{
    // Fungsi untuk menampilkan halaman kontak
    public function index()
    {
        return view('pages.contact.index'); 
    }

    // Fungsi untuk menyimpan data kontak
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke database
        Contact::create($validatedData); // Menggunakan data yang sudah divalidasi

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('pages.contact.index')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
