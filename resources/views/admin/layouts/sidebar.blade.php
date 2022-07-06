
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block p-1 text-white bg-dark sidebar collapse">
        
    <div class="sidebar-sticky pt-4">
      <hr>
      <a href="/" class="d-flex sidebar-heading p-1 text-white text-decoration-none">
        <img src="{{ asset('storage/default_image/logolight.png')}}" class="bi me-2" width="35" height="27" alt="">
        <span class="fs-6">Bapelkes Mataram</span>
      </a>
      <hr>
      {{-- PUBLIC DATA --}}
      <h6 class="sidebar-heading d-flex justify-content mb-3 text-muted">
          Public Data
      </h6>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/admin" class="nav-link {{Request::is('admin') ? 'active' : ''}} text-light">
            <span data-feather="home"></span>
            Home
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/posts" class="nav-link text-light {{Request::is('admin/posts*') ? 'active' : ''}}">
            <span data-feather="file-text"></span>
            Post
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/agenda" class="nav-link text-light {{Request::is('admin/agenda*') ? 'active' : ''}}">
            <span data-feather="calendar"></span>
            Jadwal Agenda
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/trainingschedule" class="nav-link text-light {{Request::is('admin/trainingschedule*') ? 'active' : ''}}">
            <span data-feather="book"></span>
            Pelatihan
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light dropdown-toggle collapsed {{Request::is('admin/employees*') ? 'active' : Request::is('admin/thl*') ? 'active' : ''}}" data-bs-toggle="collapse" data-bs-target="#sdm-collapse" aria-expanded="false">
            <span data-feather="users"></span>
            Pegawai
          </a>
          <div class="collapse {{Request::is('admin/employees*') ? 'show' : Request::is('admin/thl*') ? 'show' : ''}}" id="sdm-collapse">
            <ul class="fw-normal btn-toggle-nav pb-1">
              <li><a href="/admin/employees" class="categoryList {{Request::is('admin/employees*') ? 'active' : ''}} link-light rounded">ASN</a></li>
              <li><a href="/admin/thl" class="categoryList {{Request::is('admin/thl*') ? 'active' : ''}} link-light rounded">P3K</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light dropdown-toggle collapsed {{Request::is('admin/sarana*') ? 'active' : Request::is('admin/iventaris*') ? 'active' : ''}}" data-bs-toggle="collapse" data-bs-target="#sarpras-collapse" aria-expanded="false">
            <span data-feather="inbox"></span>
            Sarpras
          </a>
          <div class="collapse {{Request::is('admin/sarana*') ? 'show' : Request::is('admin/iventaris*') ? 'show' : ''}}" id="sarpras-collapse">
            <ul class="fw-normal btn-toggle-nav pb-1">
              <li><a href="/admin/sarana" class="categoryList {{Request::is('admin/sarana*') ? 'active' : ''}} link-light rounded">Sarana</a></li>
              <li><a href="/admin/iventaris" class="categoryList {{Request::is('admin/iventaris*') ? 'active' : ''}} link-light rounded">Iventaris</a></li>
            </ul>
          </div>
        </li>
      </ul>

      @can('admin')
      <hr>
      {{-- Administrator --}}
      <h6 class="sidebar-heading d-flex justify-content mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a class="nav-link dropdown-toggle text-light collapsed {{
            Request::is('admin/postcategories*') ? 'active' 
              : Request::is('admin/jobcategories*') ? 'active'
              : Request::is('admin/rankcategories*') ? 'active'
              : Request::is('admin/infocategories*') ? 'active'
              : Request::is('admin/filecategories*') ? 'active'
              : ''
            }}" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="false">
            <span data-feather="grid"></span>
            Category
          </a>
          <div class="collapse {{
            Request::is('admin/postcategories*') ? 'show' 
              : Request::is('admin/jobcategories*') ? 'show'
              : Request::is('admin/rankcategories*') ? 'show'
              : Request::is('admin/infocategories*') ? 'show'
              : Request::is('admin/filecategories*') ? 'show'
              : Request::is('admin/rolecategories*') ? 'show'
              : ''
            }}" id="category-collapse">
            <ul class="fw-normal btn-toggle-nav pb-1">
              <li><a href="/admin/postcategories" class="categoryList {{Request::is('admin/postcategories*') ? 'active' : ''}} link-light rounded">Post Category</a></li>
              <li><a href="/admin/jobcategories" class="categoryList {{Request::is('admin/jobcategories*') ? 'active' : ''}} link-light rounded">Jabatan Category</a></li>
              <li><a href="/admin/rankcategories" class="categoryList {{Request::is('admin/rankcategories*') ? 'active' : ''}} link-light rounded">Pangkat Category</a></li>
              <li><a href="/admin/infocategories" class="categoryList {{Request::is('admin/infocategories*') ? 'active' : ''}} link-light rounded">Info Category</a></li>
              <li><a href="/admin/filecategories" class="categoryList {{Request::is('admin/filecategories*') ? 'active' : ''}} link-light rounded">File Category</a></li>
              <li><a href="/admin/rolecategories" class="categoryList {{Request::is('admin/rolecategories*') ? 'active' : ''}} link-light rounded">Role Category</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a href="/admin/otherinfos" class="nav-link text-light {{Request::is('admin/otherinfos*') ? 'active' : ''}}">
            <span data-feather="info"></span>
            Web Information
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/mitra" class="nav-link text-light {{Request::is('admin/mitra*') ? 'active' : ''}}">
            <span data-feather="share-2"></span>
            Mitra Kerja
          </a>
        </li>
        
        <li class="nav-item">
          <a href="/admin/info/users" class="nav-link text-light {{Request::is('admin/info/users*') ? 'active' : ''}}">
            <span data-feather="user"></span>
              User Info
          </a>
        </li> 

        <li class="nav-item">
          <a href="/admin/rules" class="nav-link text-light {{Request::is('admin/rules*') ? 'active' : ''}}">
            <span data-feather="shield"></span>
              Role User
          </a>
        </li> 
      </ul>
      @endcan
      
    </div>
    <hr>
    <div class="dropdown p-1">
      <a class="btn-toggle d-flex text-white text-decoration-none active" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        @if (isset(auth()->user()->photo_profile))
            <img src="{{asset('storage/'.auth()->user()->photo_profile)}}" class="rounded-circle me-2" style="object-fit: cover; object-position: 100% 0" width="32" height="32">
        @else  
            <img src="{{ asset('storage/default_image/photo-profile.png') }}" class="rounded-circle me-2" width="32" height="32">
        @endif
        {{auth()->user()->username}}
      </a>
      <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser">
        <li><a class="dropdown-item" href="/admin/posts/create" type="button"><span data-feather="plus"></span> New Post</a></li>
        <li><a class="dropdown-item" href="/admin/users/setting" type="button"><span data-feather="settings"></span> Settings</a></li>
        <li><a href="/admin/users" class="dropdown-item" type="button"><span data-feather="user"></span> Profile</a></li>
        <li><hr class="dropdown-divider"></li>
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
    
  </nav>