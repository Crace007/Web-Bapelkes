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
        <li class="nav-item">
          <a class="nav-link {{Request::is('admin/jadwalpelatihan*') ? 'active' : ''}}" href="/admin/posts">
            <span data-feather="calendar"></span>
            Jadwal Pelatihan
          </a>
        </li>
        <li class="nav-item dropend">
          <a class="nav-link dropdown-toggle {{Request::is('admin/asn*') ? 'active' : Request::is('admin/thl*') ? 'active' : ''}}" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            <span data-feather="users"></span>
            SDM
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="/admin/employees">ASN</a></li>
            <li><a class="dropdown-item" href="/admin/thl">THL</a></li>
          </ul>
        </li>
      </ul>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item dropend">
          <a class="nav-link dropdown-toggle {{
              Request::is('admin/categories*') ? 'active' 
                : Request::is('admin/jobcategories*') ? 'active'
                : Request::is('admin/rankcategories*') ? 'active'
                : Request::is('admin/infocategories*') ? 'active'
                : ''
              }}" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              <span data-feather="grid"></span>
              Category
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="/admin/categories">Post Category</a></li>
            <li><a class="dropdown-item" href="/admin/jobcategories">Jabatan Category</a></li>
            <li><a class="dropdown-item" href="/admin/rankcategories">Pangkat Category</a></li>
            <li><a class="dropdown-item" href="/admin/infocategories">Info Category</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('admin/otherinfos*') ? 'active' : ''}}" aria-current="page" href="/admin/otherinfos">
            <span data-feather="info"></span>
            Information Web
          </a>
        </li>
      </ul>   
    </div>
  </nav>