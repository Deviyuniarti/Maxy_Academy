<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found'], 204);
        }

        return response()->json([
            'message' => 'Get all orders',
            'data' => $orders
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'total_amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Buat order baru
        $order = Order::create($request->all());

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order
        ], 201);
    }

    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json([
            'message' => 'Show details of order',
            'data' => $order
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'total_amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update order
        $order->update($request->all());

        return response()->json([
            'message' => 'Order updated successfully',
            'data' => $order
        ], 200);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
