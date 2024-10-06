<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    public function index()
    {
        $sales_orderData = SalesOrder::get();
        return view('pages.sales_order.index', ['sales_orderData' => $sales_orderData]);
    }
    public function create()
    {
        return view('pages.sales_order.create');

        
    }

    public function store(Request $request)
    {
        $sales_orderData = new SalesOrder;
        $sales_orderData->customer_id = $request->customer_id;
        $sales_orderData->order_date = $request->order_date;
        $sales_orderData->total_amount = $request->total_amount;
        $sales_orderData->payment_status = $request->payment_status;
        $sales_orderData->save();

        return redirect()->to('/sales_order')->with('success', 'Data berhasil disimpan');
    }

    public function view($id)
    {
        // Ambil data sales_order berdasarkan ID yang diberikan
        $sales_orderData = SalesOrder::findOrFail($id);
    
        // Kirim     sales_orderDataa ke view
        return view('pages.sales_order.view', ['sales_orderData' => $sales_orderData]);
    }
    

    public function formEdit($id)
    {
        $sales_orderData = SalesOrder::find($id);
        return view('pages.sales_order.form_edit', ['sales_orderData' => $sales_orderData]);
    }

    public function update($id, Request $request)
    {
        $sales_orderData = SalesOrder::find($id);

        if (!$sales_orderData) {
            return redirect()->to('/sales_order')->with('error', 'Data tidak ditemukan');
        }

        $sales_orderData->customer_id = $request->customer_id;
        $sales_orderData->order_date= $request->order_date;
        $sales_orderData->total_amount = $request->total_amount;
        $sales_orderData->payment_status = $request->payment_status;
        $sales_orderData->save();

        return redirect()->to('/sales_order')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $sales_orderData = SalesOrder::find($id);

        if (!$sales_orderData) {
            return redirect()->to('/sales_order')->with('error', 'Data tidak ditemukan');
        }

        $sales_orderData->delete();

        return redirect()->to('/sales_order')->with('success', 'Data berhasil dihapus');
    }
}