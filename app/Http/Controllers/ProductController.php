<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'Resource is empty'], 204);
        }

        return response()->json([
            'message' => 'Get all products',
            'data' => $products
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Buat produk baru
        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product is created successfully',
            'data' => $product
        ], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json([
            'message' => 'Show details of product',
            'data' => $product
        ], 200);
    }

        public function update(Request $request, $id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk tidak ditemukan, kirim respon 404
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update produk
        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
