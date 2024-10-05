<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #347928;
        }
        .card {
            background-color: #fff; 
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">View Sales Order</h3>
                    </div>
                    <div class="card-body">
                        <form>
                        <div class="form-floating mb-3">
                                <input class="form-control" id="inputSupplierName" type="text" placeholder="Supplier Name" readonly value="{{ $supplier_nameData->supplier_name }}" />
                                <label for="inputSupplierName">Supplier Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputOrderDate" type="date" placeholder="Order Date" readonly value="{{ $supplier_nameData->order_date }}" />
                                <label for="inputOrderDate">Order Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputTotalAmount" type="number" placeholder="Total Amount" readonly value="{{ $supplier_nameData->total_amount }}" />
                                <label for="inputTotalAmount">Total Amount</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="payment_status" type="text" placeholder="Payment Status" readonly value="{{ $supplier_nameData->payment_status }}" />
                                <label for="payment_status">Payment Status</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id=" received_status" type="text" placeholder="Received Status" readonly value="{{ $supplier_nameData->received_status }}" />
                                <label for="received_status">Received Status</label>
                            </div>
                        </form>    
                            <a href="/supplier_name" class="btn btn-secondary">Kembali ke Daftar Sales Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
