@extends('template.index')

@section('content')
    <div class="container-fluid px-2" style="color: black">
        <h2 class="mt-2">Purchase Order</h2>
        <div class="d-flex justify-content-between mb-1">
            <ol class="breadcrumb" style="color: #A72925; border: none; padding: 7px; width: 110px; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <li class="breadcrumb-item">Data Purchase Order</li>
            </ol>         
            <a href="/purchase_order/create" class="btn btn-primary"
            style="background: #347928 !important; color: #fff; border: none; padding: 7px 15px; width: auto; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-plus"></i> Tambah Purchase Order
            </a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="border: 1px solid #fff;">
                        <thead>
                            <tr style="color: black">
                                <th>ID</th>
                                <th>Suplier Name</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Received Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase_orderData as $purchase_order)
                                <tr style="color: black">
                                    <td>{{ $purchase_order->id }}</td> 
                                    <td>{{ $purchase_order->suplier_name }}</td>
                                    <td>{{ $purchase_order->order_date }}</td>
                                    <td>{{ $purchase_order->total_amount }}</td>
                                    <td>{{ $purchase_order->received_status }}</td>
                                    <td>{{ $purchase_order->created_at }}</td>
                                    <td>{{ $purchase_order->updated_at }}</td>
                                    <td>
                                        <a href="/purchase_order/view/{{ $purchase_order->id }}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i> View</a>
                                        <a href="/purchase_order/edit/{{ $purchase_order->id }}" class="btn btn-warning"><i
                                                 class="fas fa-edit"></i> Edit</a>
                                        <a href="/purchase_order/delete/{{ $purchase_order->id }}" class="btn btn-danger"
                                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $purchase_order->id }}').submit(); }"><i
                                                class="fas fa-trash"></i> Hapus</a>
                                        <form id="delete-form-{{ $purchase_order->id }}"
                                            action="/purchase_order/delete/{{ $purchase_order->id }}" method="POST"
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
