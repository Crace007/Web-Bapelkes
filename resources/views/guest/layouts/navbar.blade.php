<div class="p-4 bg-gradient-jumbotron">
  <div class="container font-vagrounded">
    <div class="d-flex bd-highlight">
      <div class="me-auto bd-highlight">
        <img class="img-fluid rounded" src="{{ asset('storage/default_image/logojumbotron.png')}}" style="width: auto; height: 80px;" alt="">
      </div>
      <div class="bd-highlight">
        <img class="img-fluid rounded" src="{{ asset('storage/default_image/kemenkes.png')}}" style="width: auto; height: 60px;" alt="">
      </div>
      <div class="bd-highlight">
        <p style="color: rgba(0, 0, 0, 0)">_</p>
      </div>
      <div class="bd-highlight">
        <img class="img-fluid rounded" src="{{ asset('storage/default_image/germas.png')}}" style="width: auto; height: 60px;" alt="">
      </div>
    </div>
    
  </div>
</div>

<div class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgba(22, 22, 22, 0.85)">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    <a class="nav-link {{Request::is('home*') ? 'active' : Request::is('/*') ? 'active' : ''}}" aria-current="page" href="/"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item dropdown" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    <a class="nav-link dropdown-toggle 
                      {{Request::is('sejarah*') ? 'active' : 
                        Request::is('visiMisi*') ? 'active' :
                        Request::is('mitra_kerja*') ? 'active' :
                        Request::is('struktur_organisasi*') ? 'active' :
                        Request::is('sdm*') ? 'active' : ''}}
                    " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-building"></i>  Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item {{Request::is('sejarah*') ? 'active' : ''}}" href="/sejarah">Sejarah</a></li>
                      <li><a class="dropdown-item {{Request::is('visiMisi*') ? 'active' : ''}}" href="/visiMisi">Visi Misi</a></li>
                      <li><a class="dropdown-item {{Request::is('mitra_kerja*') ? 'active' : ''}}" href="/mitra_kerja">Mitra Kerja</a></li>
                      <li><a class="dropdown-item {{Request::is('struktur_organisasi*') ? 'active' : ''}}" href="/struktur_organisasi">Struktur Organisasi</a></li>
                      <li><a class="dropdown-item {{Request::is('sdm*') ? 'active' : ''}}" href="/sdm">SDM</a></li>
                    </ul>
                </li>
                <li class="nav-item" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    <a class="nav-link {{Request::is('publikasi*') ? 'active' : ''}}" href="/publikasi"><i class="bi bi-newspaper"></i> Publikasi</a>
                </li>
                <li class="nav-item" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                  <a class="nav-link {{Request::is('pelatihan*') ? 'active' : ''}}" href="/pelatihan"><i class="bi bi-book"></i> Pelatihan</a>
                </li>
                <li class="nav-item dropdown" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                  <a class="nav-link dropdown-toggle 
                    {{Request::is('sarana*') ? 'active' : 
                      Request::is('pengaduan*') ? 'active' :''}}
                  " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-x-diamond-fill"></i>  Pelayanan
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item {{Request::is('sarana*') ? 'active' : ''}}" href="/sarana">Sarana</a></li>
                    <li><a class="dropdown-item {{Request::is('pengaduan*') ? 'active' : ''}}" href="/pengaduan">Pengaduan Masyarakat</a></li>
                  </ul>
              </li>
            </ul>
        </div>
    </div>
</div>