@extends('template.index')

@section('content')
    <div class="container-fluid px-2">
        <h2 class="mt-2">Edit Sales Order</h2>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Edit Sales Order</li>
            </ol>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="/purchase_order/update/{{ $purchase_orderData->id }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="supplier_name" class="col-sm-2 col-form-label">Supplier Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier_name" id="supplier_name" class="form-control"
                                value="{{ $purchase_orderData->supplier_name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order_date" class="col-sm-2 col-form-label">Order Date:</label>
                        <div class="col-sm-10">
                            <input type="date" name="order_date" id="order_date" class="form-control"
                                value="{{ $purchase_orderData->order_date }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_amount" class="col-sm-2 col-form-label">Total Amount:</label>
                        <div class="col-sm-10">
                            <input type="text" name="total_amount" id="total_amount" class="form-control"
                                value="{{ $purchase_orderData->total_amount }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="received_status" class="col-sm-2 col-form-label">Received Status:</label> 
                        <div class="col-sm-10">
                            <select name="received_status" id="received_status" class="form-control" required>
                                <option value="" disabled selected>Received Status</option>
                                <option value="received">received</option>
                                <option value="not received">not received</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="/purchase_order" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
