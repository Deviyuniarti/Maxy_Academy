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

        // Mengembalikan view dengan data reporting dan produk
        return view('pages.reporting.index', [
            'reportingData' => $reportingData,
            'productData' => $productData
        ]);
    }

        public function chartproduct()
    {
        // Mengambil semua data produk
        $productData = Product::all();

        // Mengirim data produk ke view chart
        return view('pages.reporting.chartproduct', ['productData' => $productData]);
    }
    
    public function create()
    {
        return view('pages.reporting.create');
    }

    public function store(Request $request)
    {
        $reportingData = new Reporting;
        $reportingData->name = $request->name;
        $reportingData->price = $request->price;
        $reportingData->stock = $request->stock;
        $reportingData->save();

        return redirect()->to('/reporting')->with('success', 'Data berhasil disimpan');
    }

    public function view($id)
    {
        // Ambil data reporting berdasarkan ID yang diberikan
        $reportingData = Reporting::findOrFail($id);
    
        // Kirim data reporting ke view
        return view('pages.reporting.view', ['reportingData' => $reportingData]);
    }
    
    public function formEdit($id)
    {
        $reportingData = Reporting::find($id);
        return view('pages.reporting.form_edit', ['reportingData' => $reportingData]);
    }

    public function update($id, Request $request)
    {
        $reportingData = Reporting::find($id);

        if (!$reportingData) {
            return redirect()->to('/reporting')->with('error', 'Data tidak ditemukan');
        }

        $reportingData->name = $request->name;
        $reportingData->price = $request->price;
        $reportingData->stock = $request->stock;
        $reportingData->save();

        return redirect()->to('/reporting')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $reportingData = Reporting::find($id);

        if (!$reportingData) {
            return redirect()->to('/reporting')->with('error', 'Data tidak ditemukan');
        }

        $reportingData->delete();

        return redirect()->to('/reporting')->with('success', 'Data berhasil dihapus');
    }


}



