<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $productData = Product::get();
        return view('pages.product.index', ['productData' => $productData]);
    }
    public function create()
    {
        return view('pages.product.create');
    }

    public function store(Request $request)
    {
        $productData = new Product;
        $productData->name = $request->name;
        $productData->price = $request->price;
        $productData->stock = $request->stock;
        $productData->save();

        return redirect()->to('/product')->with('success', 'Data berhasil disimpan');
    }

    public function view($id)
    {
        // Ambil data product berdasarkan ID yang diberikan
        $productData = Product::findOrFail($id);
    
        // Kirim     productDataa ke view
        return view('pages.product.view', ['productData' => $productData]);
    }
    

    public function formEdit($id)
    {
        $productData = Product::find($id);
        return view('pages.product.form_edit', ['productData' => $productData]);
    }

    public function update($id, Request $request)
    {
        $productData = Product::find($id);

        if (!$productData) {
            return redirect()->to('/product')->with('error', 'Data tidak ditemukan');
        }

        $productData->name= $request->name;
        $productData->price = $request->price;
        $productData->stock = $request->stock;
        $productData->save();

        return redirect()->to('/product')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $productData = Product::find($id);

        if (!$productData) {
            return redirect()->to('/product')->with('error', 'Data tidak ditemukan');
        }

        $productData->delete();

        return redirect()->to('/product')->with('success', 'Data berhasil dihapus');
    }
}


