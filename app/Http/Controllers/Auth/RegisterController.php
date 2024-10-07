<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        // Simpan data ke database
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}