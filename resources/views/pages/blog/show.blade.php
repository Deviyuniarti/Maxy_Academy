@extends('auth.layouts.auth')

@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Kisah Sehari-Hari</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                <p>Published on {{ $post->created_at->format('d M Y') }} by {{ $post->user->name }}</p>
                <hr>
                <a href="{{ route('blog.index') }}">Back to all posts</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>&copy; 2024 Kisah Sehari-Hari. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
@endsection
