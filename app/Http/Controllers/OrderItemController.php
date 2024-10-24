<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::with('order', 'product')->get();
    }

    public function show($id)
    {
        return OrderItem::with('order', 'product')->findOrFail($id);
    }

    public function store(Request $request)
    {
        // Gunakan Validator untuk memvalidasi request
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembalikan respon error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Jika validasi sukses, buat OrderItem baru
        $orderItem = OrderItem::create($request->all());

        return response()->json([
            'message' => 'OrderItem created successfully',
            'data' => $orderItem
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        
        // Validasi sebelum update
        $validator = Validator::make($request->all(), [
            'order_id' => 'sometimes|exists:orders,id',
            'product_id' => 'sometimes|exists:products,id',
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
        ]);

        // Jika validasi gagal, kembalikan respon error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update order item
        $orderItem->update($request->all());

        return response()->json([
            'message' => 'OrderItem updated successfully',
            'data' => $orderItem
        ]);
    }

    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id); 
        $orderItem->delete();

        return response()->json([
            'message' => 'OrderItem deleted successfully'
        ], 200);
    }
}
