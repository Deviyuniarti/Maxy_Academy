@extends('layouts.index')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Introduction -->
            <div class="mb-4">
                <h1>Selamat Datang di Blog Anak Rantau</h1>
                <p>Blog ini berisi pengalaman, cerita, dan perjuangan seorang anak rantau di kota besar. Nikmati cerita menarik dan inspiratif di setiap tulisan kami.</p>
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
                    </p>
                </div>
                <hr class="my-4" />
            @endforeach

            <!-- Pager -->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ route('posts.index') }}">Lihat Semua Tulisan →</a></div>
        </div>
    </div>
</div>
@endsection
