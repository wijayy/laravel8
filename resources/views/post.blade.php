@extends('layout.main')

@section('container')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2>{{ $post->title }}</h2>
        <p>By <a href="/posts?author={{ $post->author->username }}" class="">{{ $post->author->name }}</a> in <a
            class="" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        @if ($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" class="mt-3 img-fluid" alt="{{ $post->category->name }}">
        @else
          <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}" class="mt-3 img-fluid"
            alt="{{ $post->category->name }}">
        @endif
        <div style="text-align: justify" class="my-3 fs-3">{!! $post->body !!}</div>

        <a href="/posts" class="btn btn-light">Back</a>
      </div>
    </div>
  </div>
@endsection\
