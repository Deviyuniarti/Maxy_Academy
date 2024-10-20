<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporting;
use App\Models\Product;

class ReportingController extends Controller
{
    public function index()
    {
        // Mengambil data reporting
        $reportingData = Reporting::all();

        // Mengambil data produk
        $productData = Product::all();

        // Mengembalikan view dengan data reporting dan product
        return view('pages.reporting.index', [
            'reportingData' => $reportingData,
            'productData' => $productData // Pastikan ini ditambahkan
        ]);
    }

    public function getProductData()
    {
        // Mengambil data produk
        $productData = Product::all();

        // Menambahkan rentang harga dan tanggal ke setiap produk
        foreach ($productData as $product) {
            if ($product->price < 50000) {
                $product->price_range = 'less_50000';
            } else if ($product->price >= 50000 && $product->price < 100000) {
                $product->price_range = '_50000_99999';
            } else if ($product->price >= 100000 && $product->price < 1000000) {
                $product->price_range = '_100000_999999';
            } else {
                $product->price_range = 'more_1000000';
            }

            // Menggunakan substr untuk mengambil tanggal
            $product->created_range = substr($product->created_at, 0, 7);  
        }

        return response()->json($productData);
    }

    public function chartproduct()
    {
        $data = [
            "less_50000" => 50,
            "_50000_99999" => 43,
            "_100000_999999" => 343,
            "more_1000000" => 21
        ];
        return response($data);
    }
}

