<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        return view('pages.user.index', compact('dataUser'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $dataUser = new User;
        $dataUser->name = $request->input('name');
        $dataUser->email = $request->input('email');
        $dataUser->password = $request->input('password');
        $dataUser->save();

        return redirect('/user')->with('success', 'Data berhasil disimpan');
    }

    public function view($id)
    {
        $dataUser = User::findOrFail($id);
        return view('pages.user.view', compact('dataUser'));
    }
    

    public function formEdit($id)
    {
        $dataUser = User::findOrFail($id);
        return view('pages.user.form_edit', compact('dataUser'));
    }

    public function update($id, Request $request)
    {
        $dataUser = User::findOrFail($id);

        $dataUser->name = $request->input('name');
        $dataUser->email = $request->input('email');
        $dataUser->password = $request->input('password');
        $dataUser->save();

        return redirect('/user')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $dataUser = User::findOrFail($id);
        $dataUser->delete();

        return redirect('/user')->with('success', 'Data berhasil dihapus');
    }
}
?>