<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Customer</title>
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
                        <h3 class="text-center font-weight-light my-4">View Customer</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputName" type="text" placeholder="Name" readonly value="{{ $customerData->name }}" />
                                <label for="inputName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" placeholder="Email" readonly value="{{ $customerData->email }}" />
                                <label for="inputEmail">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPhone" type="text" placeholder="Phone" readonly value="{{ $customerData->phone }}" />
                                <label for="inputPhone">Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputAddress" type="text" placeholder="Address" readonly value="{{ $customerData->address }}" />
                                <label for="inputAddress">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputMembership_level" type="text" placeholder="Membership_level" readonly value="{{ $customerData->membership_level }}" />
                                <label for="inputMembership_level">Membership level</label>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="/customer" class="btn btn-secondary">Kembali ke Daftar Customer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
