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
            
        for ($i = 0; $i < count($productData); $i++) {
            if ($productData[$i]['price'] < 50000) {
                $productData[$i]['price_range'] = 'less_50000';
            } else if ($productData[$i]['price'] >= 50000 && $productData[$i]['price'] < 100000) {
                $productData[$i]['price_range'] = '_50000_99999';
            } else if ($productData[$i]['price'] >= 100000 && $productData[$i]['price'] < 1000000) {
                $productData[$i]['price_range'] = '_100000_999999';
            } else {
                $productData[$i]['price_range'] = 'more_1000000';
            }

            // Menggunakan substr untuk mengambil tanggal
            $productData[$i]['created_range'] = substr($productData[$i]['created_at'], 0, 7);  
        }

        // Mengembalikan view dengan data reporting dan produk
        return view('pages.reporting.index', [
            'reportingData' => $reportingData,
            'productData' => $productData
        ]);
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
