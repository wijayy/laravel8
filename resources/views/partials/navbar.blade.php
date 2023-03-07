{{-- <nav class="nav container-fluid">
  <i class="uil uil-bars navOpenBtn"></i>
  <a href="/" class="logo">CodingLab</a>

  <ul class="nav-links">
    <i class="uil uil-times navCloseBtn"></i>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/posts">posts</a></li>
    <li><a href="/categories">category</a></li>
    <li><a href="/">Contact Us</a></li>
  </ul>

  <i class="uil uil-search search-icon" id="searchIcon"></i>
  <div class="search-box">
    <i class="uil uil-search search-icon"></i>
    <form action="" method="post">
      <input type="text" placeholder="Search here..." />
    </form>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid container">
    <a class="navbar-brand" href="/">mertawijaya</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">about</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}" href="/posts">post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">category</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>My
                  Dashboard</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> sign-in</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
