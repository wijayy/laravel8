@extends('layout.main')

@section('container')
  <div class="row text-center justify-content-center">
    <div class="col-lg-7">
      <main class="form-registration w-100 m-auto">
        <img class="mb-4" src="/img/MW.png" alt="" width="100">
        <h1 class="h3 mb-3 fw-normal">Register Form</h1>
        <form action="/register" method="post">
          @csrf
          <div class="form-floating">
            <input value="{{ old('name') }}" required type="text" name="name"
              class="form-control @error('name') is-invalid @enderror rounded-top" id="name" placeholder="name">
            <label for="name">Nama</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input value="{{ old('username') }}" required type="text" name="username"
              class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username">
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input value="{{ old('email') }}" required type="email" name="email"
              class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input required type="password" name="password"
              class="form-control @error('password') is-invalid @enderror rounded-bottom" id="password"
              placeholder="password">
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
        </form>
        <small class="d-block text-center mt-3">Already registered? <a href="/login">login</a></small>
      </main>
    </div>
  </div>
@endsection
