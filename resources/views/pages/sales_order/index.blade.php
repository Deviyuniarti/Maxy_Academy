@extends('template.index')

@section('content')
    <div class="container-fluid px-2" style="color: black">
        <h2 class="mt-2">Sales Order</h2>
        <div class="d-flex justify-content-between mb-1">
            <ol class="breadcrumb" style="color: #A72925; border: none; padding: 8px; width: 110px; height: 50px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <li class="breadcrumb-item">Data Sales Order</li>
            </ol>         
            <a href="/sales_order/create" class="btn btn-primary"
            style="background: #347928 !important; color: #fff; border: none; padding: 7px 15px; width: auto; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-plus"></i> Tambah Sales Order
            </a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="border: 1px solid #fff;">
                        <thead>
                            <tr style="color: black">
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales_orderData as $sales_order)
                                <tr style="color: black">
                                    <td>{{ $sales_order->id }}</td> 
                                    <td>{{ $sales_order->customer_id }}</td> 
                                    <td>{{ $sales_order->order_date }}</td>
                                    <td>{{ $sales_order->total_amount }}</td>
                                    <td>{{ $sales_order->payment_status }}</td>
                                    <td>{{ $sales_order->created_at }}</td>
                                    <td>{{ $sales_order->updated_at }}</td>
                                    <td style="display: flex; gap: 5px;">
                                        <a href="/sales_order/view/{{ $sales_order->id }}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i> View</a>
                                        <a href="/sales_order/edit/{{ $sales_order->id }}" class="btn btn-warning"><i
                                                 class="fas fa-edit"></i> Edit</a>
                                        <a href="/sales_order/delete/{{ $sales_order->id }}" class="btn btn-danger"
                                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $sales_order->id }}').submit(); }"><i
                                                class="fas fa-trash"></i> Hapus</a>
                                        <form id="delete-form-{{ $sales_order->id }}"
                                            action="/sales_order/delete/{{ $sales_order->id }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
