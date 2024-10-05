<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    
    public function index()
    {
        $purchase_orderData = PurchaseOrder::get();
        return view('pages.purchase_order.index', ['purchase_orderData' => $purchase_orderData]);
    }
    public function create()
    {
        return view('pages.purchase_order.create');

        
    }

    public function store(Request $request)
    {
        $purchase_orderData = new PurchaseOrder;
        $purchase_orderData->supplier_name = $request->supplier_name;
        $purchase_orderData->order_date = $request->order_date;
        $purchase_orderData->total_amount = $request->total_amount;
        $purchase_orderData->payment_status = $request->payment_status;
        $purchase_orderData->received_status = $request->received_status;
        $purchase_orderData->save();

        return redirect()->to('/purchase_order')->with('success', 'Data berhasil disimpan');
    }

    public function view($id)
    {
        // Ambil data purchase_order berdasarkan ID yang diberikan
        $purchase_orderData = purchaseOrder::findOrFail($id);
    
        // Kirim     purchase_orderDataa ke view
        return view('pages.purchase_order.view', ['purchase_orderData' => $purchase_orderData]);
    }
    

    public function formEdit($id)
    {
        $purchase_orderData = PurchaseOrder::find($id);
        return view('pages.purchase_order.form_edit', ['purchase_orderData' => $purchase_orderData]);
    }

    public function update($id, Request $request)
    {
        $purchase_orderData = PurchaseOrder::find($id);

        if (!$purchase_orderData) {
            return redirect()->to('/purchase_order')->with('error', 'Data tidak ditemukan');
        }

        $purchase_orderData->supplier_name= $request->supplier_name;
        $purchase_orderData->order_date= $request->order_date;
        $purchase_orderData->total_amount = $request->total_amount;
        $purchase_orderData->payment_status = $request->payment_status;
        $purchase_orderData->received_status = $request->received_status;
        $purchase_orderData->save();

        return redirect()->to('/purchase_order')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $purchase_orderData = PurchaseOrder::find($id);

        if (!$purchase_orderData) {
            return redirect()->to('/purchase_order')->with('error', 'Data tidak ditemukan');
        }

        $purchase_orderData->delete();

        return redirect()->to('/purchase_order')->with('success', 'Data berhasil dihapus');
    }
}
