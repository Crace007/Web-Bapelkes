<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{Request::is('admin') ? 'active' : ''}}" aria-current="page" href="/admin">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('admin/posts*') ? 'active' : ''}}" href="/admin/posts">
            <span data-feather="file-text"></span>
            Post
          </a>
        </li>
      </ul>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
        <ul class="nav flex-colomn">
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/categories*') ? 'active' : ''}}" href="/admin/categories">
              <span data-feather="grid"></span>
              Category
            </a>
          </li>
        </ul>
   
    </div>
  </nav>