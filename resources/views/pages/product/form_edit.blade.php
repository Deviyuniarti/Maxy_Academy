@extends('template.index')

@section('content')
    <div class="container-fluid px-2">
        <h2 class="mt-2">Edit Product</h2>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="/product/update/{{ $productData->id }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $productData->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ $productData->price }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock:</label> 
                        <div class="col-sm-10">
                            <input type="number" name="stock" id="stock" class="form-control"
                                value="{{ $productData->stock }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="/product" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
