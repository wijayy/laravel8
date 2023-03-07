<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'text-primary' : 'text-dark' }}" href="/dashboard">
          <i class='bx bx-home align-text-bottom fs-4'></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/post*') ? 'text-primary' : 'text-dark' }}" href="/dashboard/post">
          <i class='bx bx-file align-text-bottom fs-4'></i>
          My Posts
        </a>
      </li>
    </ul>


    @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'text-primary' : 'text-dark' }}"
            href="/dashboard/categories">
            <i class='bx bx-category align-text-bottom fs-4'></i>
            Post Categories
          </a>
        </li>
      </ul>
    @endcan

  </div>
</nav>
