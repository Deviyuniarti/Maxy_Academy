@extends('layouts.index')

@section('content')
<form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="message">Pesan</label>
        <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@endsection
