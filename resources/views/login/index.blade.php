@extends('layout.main')

@section('container')
  <div class="row text-center justify-content-center">
    <div class="col-md-5">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <main class="form-signin w-100 m-auto">
        <img class="mb-4" src="/img/MW.png" alt="" width="100">
        <h1 class="h3 mb-3 fw-normal">Please log-in</h1>
        <form action="/login" method="post">
          @csrf
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email"
              required placeholder="name@example.com" autofocus value="{{ old('email') }}">
            <label for="floatingInput">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control @error('passoword') is-invalid @enderror "
              id="password" required placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
        </form>
        <small class="d-block text-center mt-3">Not registered? <a href="/register">register now</a></small>
      </main>
    </div>
  </div>
@endsection
