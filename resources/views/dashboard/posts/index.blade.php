@extends('dashboard.layout.main')


@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  <a href="/dashboard/post/create" class="btn btn-primary mb-3">Create New Posts</a>

  @if (session()->has('success'))
    <div class="alert alert-success text-center" role="alert">
      {{ session('success') }}
    </div>
  @endif


  <div class="table-responsive ">
    <table class="table table-striped table-lg">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col-4">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
              <a href="/dashboard/post/{{ $post->slug }}" class="badge bg-info"><i class='bx bx-show fs-4'></i></a>
              <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge bg-warning"><i
                  class='bx bx-edit fs-4'></i></a>
              <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('yakin?')"><i
                    class='bx bx-trash fs-4'></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
