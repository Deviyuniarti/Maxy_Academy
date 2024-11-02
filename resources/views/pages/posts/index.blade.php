@extends('layouts.index')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Tautan untuk membuat postingan baru -->
            <div class="mb-4">
                <a class="btn btn-primary" href="{{ route('posts.create') }}">Buat Postingan Baru</a>
            </div>

            <!-- Recent Posts preview -->
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('posts.show', $post->slug) }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ $post->subtitle ?? 'Sebuah kisah menarik.' }}</h3>
                    </a>
                    <p class="post-meta">
                        Ditulis oleh <a href="#!">{{ $post->author }}</a> pada {{ $post->created_at->format('d F Y') }}
                        <br>
                        <a class="btn btn-secondary" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                    </p>
                </div>
                <hr class="my-4" />
            @endforeach

            <!-- Pager -->
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="{{ route('posts.index')  }}">Lihat Semua Tulisan →</a>
            </div>
        </div>
    </div>
</div>
@endsection
