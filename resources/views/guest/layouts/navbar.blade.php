<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Bapelkes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{($active==="home")?'active':''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($active==="about")?'active':''}}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($active==="blog")?'active':''}}" href="/posts">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($active==="category")?'active':''}}" href="/categories">Category</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome back, {{auth()->user()->username}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/admin"><i class="bi bi-card-checklist"></i> Admin Page</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <form action="/logout" method="POST">
                            @csrf
                              <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right"></i> Log Out</a></li>
                              </button>
                          </form>
                    </ul>
                  </li>
                @else    
                <li class="nav-item">
                    <a class="nav-link {{($active==="login")?'active':''}}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>