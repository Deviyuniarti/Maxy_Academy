@extends('template.index')

@section('content')
    <div class="container-fluid px-2">
        <h2 class="mt-2">Create Purchase Order</h2>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb" style="color: #A72925; border: none; padding: 8px; width: 110px; height: 50px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <li class="breadcrumb-item">Data Purchase Order</li>
            </ol> 
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="/purchase_order/simpan-data" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="supplier_name" class="col-sm-2 col-form-label">Supplier name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier_name" id="supplier_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order_date" class="col-sm-2 col-form-label">Order Date:</label>
                        <div class="col-sm-10">
                            <input type="date" name="order_date" id="order_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_amount" class="col-sm-2 col-form-label">Total Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" name="total_amount" id="total_amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="received_status" class="col-sm-2 col-form-label">received Status:</label> 
                        <div class="col-sm-10">
                            <select name="received_status" id="received_status" class="form-control" required>
                                <option value="">Select Received Status</option>
                                <option value="received">Received</option>
                                <option value="not_received">Not Received</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="/sales_order" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
