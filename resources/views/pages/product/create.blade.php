@extends('template.index')

@section('content')
    <div class="container-fluid px-2">
        <h2 class="mt-2">Create Product</h2>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb" style="color: #A72925; border: none; padding: 7px; width: 110px; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <li class="breadcrumb-item">Data Product</li>
            </ol> 
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="/product/simpan-data" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock:</label> 
                        <div class="col-sm-10">
                            <input type="number" name="stock" id="stock" class="form-control" required>
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
