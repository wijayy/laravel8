@extends('dashboard.layout.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/post" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label text-capitalize">title</label>
        <input value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror"
          id="title" name="title" autofocus>
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="slug" class="form-label text-capitalize">slug</label>
        <input value="{{ old('slug') }}" type="text" class="form-control @error('slug') is-invalid @enderror"
          id="slug" name="slug" readonly>
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="category" class="form-label text-capitalize">category</label>
        <select class="form-select" id="category" name="category_id">
          @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <img src="" alt="" class=" img-preview img-fluid mb-4"
          style="max-width: 300px; height: fit-content;">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
          onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="body" class="form-label text-capitalize">body</label>
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        @error('body')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
        @enderror
        <trix-editor input="body"></trix-editor>
      </div>

      <button type="submit" class="btn btn-primary">Create Posts</button>
    </form>
  </div>

  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
      fetch('/dashboard/post/checkSlug?title=' + title.value + '')
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      console.log(data.slug);
    })

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })

    function previewImage() {
      const image = document.querySelector("#image");
      const imgPreview = document.querySelector(".img-preview");

      imgPreview.style.display = 'block';

      const blob = URL.createObjectURL(image.files[0]);
      imgPreview.src = blob;

    }
  </script>
@endsection
