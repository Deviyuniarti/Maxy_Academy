<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customerData = Customer::get();
        return view('pages.customer.index', ['customerData' => $customerData]);
    }
    public function create()
    {
        return view('pages.customer.create');
    }

    public function store(Request $request)
    {
        $customerData = new Customer;
        $customerData->name = $request->name;
        $customerData->email = $request->email;
        $customerData->phone = $request->phone;
        $customerData->address = $request->address;
        $customerData->membership_level = $request->membership_level;
        $customerData->save();

        return redirect()->to('/customer')->with('success', 'Data berhasil disimpan');
    }

    public function view($id)
    {
        // Ambil data customer berdasarkan ID yang diberikan
        $customerData = Customer::findOrFail($id);
    
        // Kirim customerData ke view
        return view('pages.customer.view', ['customerData' => $customerData]);
    }
    

    public function formEdit($id)
    {
        $customerData = Customer::find($id);
        return view('pages.customer.form_edit', ['customerData' => $customerData]);
    }

    public function update($id, Request $request)
    {
        $customerData = Customer::find($id);

        if (!$customerData) {
            return redirect()->to('/customer')->with('error', 'Data tidak ditemukan');
        }

        $customerData->name= $request->name;
        $customerData->email = $request->email;
        $customerData->phone = $request->phone;
        $customerData->address = $request->address;
        $customerData->membership_level = $request->membership_level;
        $customerData->save();

        return redirect()->to('/customer')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $customerData = Customer::find($id);

        if (!$customerData) {
            return redirect()->to('/customer')->with('error', 'Data tidak ditemukan');
        }

        $customerData->delete();

        return redirect()->to('/customer')->with('success', 'Data berhasil dihapus');
    }
}
