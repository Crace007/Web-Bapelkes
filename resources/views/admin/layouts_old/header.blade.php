<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Bapelkes mataram</a>
    <div class="col d-flex flex-column">
      <div class="px-2 text-light"><marquee>Informasi pengumpulan data berikut terakhir pada tanggal 30 maret 2022</marquee></div>
    </div>
     {{-- <input class="form-control form-control-dark w-90" type="text" placeholder="Search" aria-label="Search"> --}}
    <div class="d-flex flex-row-reverse">
      <div class="p-0">
        <div class="btn-group">
        <button type="button" class="btn btn-outline-dark text-light" data-bs-toggle="dropdown" aria-expanded="false">
          <span data-feather="bell"></span>
          <span class="position-absolute badge rounded-pill bg-danger">
            4
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
          {{-- <button type="button" class="btn btn-outline-dark text-light" data-bs-toggle="dropdown" aria-expanded="false">
            <sup>2</sup>
          </button> --}}
          <ul class="dropdown-menu dropdown-menu-end ">
            <li><a href="#" class="dropdown-item" type="button"><span data-feather="user"></span> info 1</a></li>
            <li><a href="#" class="dropdown-item" type="button"><span data-feather="user"></span> info 2</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="d-flex flex-row-reverse">
      <div class="p-2 flex-shrink-1 bd-highlight">
        <button class="navbar-toggler btn-outline-0 d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>

    <div class="d-flex flex-row-reverse">
      <div class="p-0">
        <div class="btn-group">
          <button type="button" class="btn btn-outline-dark text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{auth()->user()->username}}
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a href="/admin/users" class="dropdown-item" type="button"><span data-feather="user"></span> Profile</a></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                  <button class="dropdown-item" type="submit">
                    <span data-feather="log-out"></span> Logout 
                  </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>

      
      
</header>