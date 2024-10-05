@extends('template.index')

@section('content')
    <div class="container-fluid px-2" style="color: black">
        <h2 class="mt-2">Product</h2>
        <div class="d-flex justify-content-between mb-1">
            <ol class="breadcrumb" style="color: #A72925; border: none; padding: 7px; width: 110px; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <li class="breadcrumb-item">Data Product</li>
            </ol>         
            <a href="/product/create" class="btn btn-primary"
            style="background: #347928 !important; color: #fff; border: none; padding: 7px 15px; width: auto; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-plus"></i> Tambah Product
            </a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="border: 1px solid #fff;">
                        <thead>
                            <tr style="color: black">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productData as $product)
                                <tr style="color: black">
                                    <td>{{ $product->id }}</td> 
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a href="/product/view/{{ $product->id }}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i> View</a>
                                        <a href="/product/edit/{{ $product->id }}" class="btn btn-warning"><i
                                                 class="fas fa-edit"></i> Edit</a>
                                        <a href="/product/delete/{{ $product->id }}" class="btn btn-danger"
                                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }"><i
                                                class="fas fa-trash"></i> Hapus</a>
                                        <form id="delete-form-{{ $product->id }}"
                                            action="/product/delete/{{ $product->id }}" method="POST"
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
