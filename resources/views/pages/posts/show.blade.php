@extends('layouts.index')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- JSON-LD Script for SEO -->
            <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "BlogPosting",
              "headline": "{{ $post->title }}",
              "datePublished": "{{ $post->created_at->format('Y-m-d') }}",
              "author": {
                "@type": "Person",
                "name": "Maxians Team"
              }
            }
            </script>
            
            <!-- Post Content -->
            <h1>{{ $post->title }}</h1>
            <p>Ditulis oleh <a href="#!">{{ $post->author }}</a> pada {{ $post->created_at->format('d F Y') }}</p>
            <hr />
            <div class="post-content">
                {!! $post->content !!} 
            </div>
        </div>
    </div>
</div>
@endsection
