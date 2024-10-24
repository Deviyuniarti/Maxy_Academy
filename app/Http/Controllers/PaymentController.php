<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('order')->get();
    }

    public function show($id)
    {
        return Payment::with('order')->findOrFail($id);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:255',
        ]);

        // Jika validasi gagal, kembalikan respon error
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Jika validasi berhasil, buat pembayaran baru
        $payment = Payment::create($request->all());

        return response()->json([
            'message' => 'Payment created successfully',
            'payment' => $payment
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Temukan payment berdasarkan ID
        $payment = Payment::findOrFail($id);

        // Validasi input untuk update
        $validator = Validator::make($request->all(), [
            'order_id' => 'sometimes|exists:orders,id',
            'amount' => 'sometimes|numeric|min:0',
            'payment_method' => 'sometimes|string|max:255',
        ]);

        // Jika validasi gagal, kembalikan respon error
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Jika validasi berhasil, lakukan update
        $payment->update($request->all());

        return response()->json([
            'message' => 'Payment updated successfully',
            'payment' => $payment
        ]);
    }

    public function destroy($id)
    {
        // Temukan payment berdasarkan ID
        $payment = Payment::findOrFail($id);
        
        // Hapus payment
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully'
        ], 200);
    }
}
