<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Pupblic Data</span>
      </h6>
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
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{Request::is('admin/categories*') ? 'active' : ''}}" href="/admin/categories">
            <span data-feather="grid"></span>
            Category
          </a>
        </li>
        <li class="nav-item dropend">
          <a class="nav-link dropdown-toggle {{Request::is('admin/informations*') ? 'active' : ''}}" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            <span data-feather="info"></span>
            Information
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="/admin/otherinfos">Post Info</a></li>
            <li><a class="dropdown-item" href="/admin/infocategories">Category Info</a></li>
          </ul>
        </li>
      </ul>   
    </div>
  </nav>