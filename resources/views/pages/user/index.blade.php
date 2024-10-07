@extends('template.index')

@section('content')
    <div class="container-fluid px-2" style="color: black">
        <h2 class="mt-2">User</h2>
        <div class="d-flex justify-content-between mb-1">
            <ol class="breadcrumb" style="color: blue; border: none; padding: 7px; width: 110px; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
            <li class="breadcrumb-item">Data User</li>
            </ol>         
            <a href="/user/create" class="btn btn-primary"
            style="background: #347928; color: #fff; border: none; padding: 7px 15px; width: auto; height: 40px; font-size: 14px; cursor: pointer; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-plus"> Tambah User</i>
            </a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="border: 1px solid #fff;">
                        <thead>
                            <tr style="color: black">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataUser as $user)
                                <tr style="color: black">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        
                                        <div class="btn-group">
                                            <a href="/user/view/{{ $user->id }}" class="btn btn-primary btn-sm btn-action"><i
                                                class="fas fa-eye"></i> View</a>
                                            <a href="/user/edit/{{ $user->id }}" class="btn btn-warning btn-sm btn-action"><i
                                                    class="fas fa-edit"></i> Edit</a>
                                            <form id="delete-form-{{ $user->id }}"
                                                action="/user/delete/{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-action"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </div>
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
