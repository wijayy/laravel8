@extends('layout.main')

@section('container')
  <h1 class="text-capitalize text-center">{{ $title }}</h1>

  <div class="row justify-content-center mb-md-3">
    <div class="col-md-8">
      <form action="/posts" method="get">
        <div class="input-group mb-3">
          @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <input type="text" class="form-control" placeholder="Search.." name="search"
            value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-3">
      @if ($posts[0]->image)
        <img src="{{ asset('storage/' . $posts[0]->image) }}" class=" img-fluid" alt="{{ $posts[0]->category->name }}">
      @else
        <img src="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}" class="card-img-top"
          alt="{{ $posts[0]->category->name }}">
      @endif
      <div class="card-body text-center">
        <h5 class="card-title"><a class="text-decoration-none text-dark"
            href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
        </h5>
        <p>
          <small>
            By <a href="/posts?author={{ $posts[0]->author->username }}"
              class="text-decoration-none">{{ $posts[0]->author->name }}</a>
            in
            <a class="text-decoration-none"
              href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
            {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>
        <p class="card-text">{{ $posts[0]['excerpt'] }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">read more</a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @foreach ($posts->skip(1) as $post)
          <div class="col-4 mb-3">
            <div class="card">
              <div class="position-absolute  px-3 py-2 text-white"
                style="background-color: rgba(0,0,0,0.5); border-radius: 5px 0 12px 0">
                <a class="text-decoration-none text-white"
                  href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
              </div>

              @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class=" img-fluid" alt="{{ $post->category->name }}">
              @else
                <img src="https://source.unsplash.com/300x200?{{ $post->category->name }}" class="card-img-top"
                  alt="{{ $post->category->name }}">
              @endif

              <div class="card-body">
                <h5 class="card-title"><a class="text-decoration-none"
                    href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                <p>
                  <small>
                    By <a href="/posts?author={{ $post->author->username }}"
                      class="text-decoration-none">{{ $post->author->name }}</a>
                    {{ $post->created_at->diffForHumans() }}
                  </small>
                </p>
                <p class="card-text">
                  {{ $post->excerpt }}
                </p>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">read more</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <p class="text-center fs-4">No Posts Found</p>
  @endif
  <div class="container d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
@endsection
