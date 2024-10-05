@extends('template.index')

@section('content')
    <div class="container-fluid px-2" style="color: black">
        <h2 class="mt-2">Customer</h2>
        <div class="d-flex justify-content-between mb-1">
            <ol class="breadcrumb" style="color: #A72925; border: none; padding: 7px; width: 110px; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <li class="breadcrumb-item">Data Customer</li>
            </ol>         
            <a href="/customer/create" class="btn btn-primary"
            style="background: #347928 !important; color: #fff; border: none; padding: 7px 15px; width: auto; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-plus"></i> Tambah Customer
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>address</th>
                                <th>Membership Level</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customerData as $customer)
                                <tr style="color: black">
                                    <td>{{ $customer->id }}</td> 
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->address}}</td>
                                    <td>{{ $customer->membership_level }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>{{ $customer->updated_at }}</td>
                                    <td>
                                        <a href="/customer/view/{{ $customer->id }}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i> View</a>
                                        <a href="/customer/edit/{{ $customer->id }}" class="btn btn-warning"><i
                                                 class="fas fa-edit"></i> Edit</a>
                                        <a href="/customer/delete/{{ $customer->id }}" class="btn btn-danger"
                                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $customer->id }}').submit(); }"><i
                                                class="fas fa-trash"></i> Hapus</a>
                                        <form id="delete-form-{{ $customer->id }}"
                                            action="/customer/delete/{{ $customer->id }}" method="POST"
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
