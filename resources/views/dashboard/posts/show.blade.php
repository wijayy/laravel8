@extends('dashboard.layout.main')

@section('container')
  <div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
        <h2>{{ $post->title }}</h2>
        <div class="d-flex ">


          <a href="/dashboard/post" class="btn btn-success d-flex align-items-center mx-2"><i
              class='bx fs-5 bx-left-arrow-alt'></i>Back</a>
          <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning d-flex align-items-center mx-2"><i
              class='bx fs-5 bx-edit-alt'></i>Edit</a>
          <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger d-flex align-items-center mx-2" onclick="return confirm('yakin?')"><i
                class='bx bx-trash fs-5'></i>Delete</button>
          </form>
        </div>

        @if ($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" class="mt-3 img-fluid" alt="{{ $post->category->name }}">
        @else
          <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}" class="mt-3 img-fluid"
            alt="{{ $post->category->name }}">
        @endif

        <div style="text-align: justify" class="mt-3 fs-3">{!! $post->body !!}</div>

        <a href="/dashboard/post" class="btn btn-light">Back</a>
      </div>
    </div>
  </div>
@endsection
