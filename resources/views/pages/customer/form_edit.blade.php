@extends('template.index')

@section('content')
    <div class="container-fluid px-2">
        <h2 class="mt-2">Edit Customer</h2>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="/customer/update/{{ $customerData->id }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $customerData->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $customerData->email }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone:</label> 
                        <div class="col-sm-10">
                            <input type="tel" name="phone" id="phone" class="form-control"
                                value="{{ $customerData->phone }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address:</label> 
                        <div class="col-sm-10">
                            <input type="address" name="address" id="address" class="form-control"
                                value="{{ $customerData->address }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="membership_level" class="col-sm-2 col-form-label">Membership Level:</label> 
                        <div class="col-sm-10">
                            <select name="membership_level" id="membership_level" class="form-control" required>
                                <option value="" disabled selected>Select Membership</option>
                                <option value="basic">Basic</option>
                                <option value="premium">Premium</option>
                                <option value="vip">VIP</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="/customer" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
