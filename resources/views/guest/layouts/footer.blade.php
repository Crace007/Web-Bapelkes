<div class="bg-dark text-white">
    <!-- Grid container -->
    <div class="container p-3">
      <!-- Section: Social media -->
      <section class="mb-4 text-end">
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="bi bi-instagram"></i>
        </a>

        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="bi bi-facebook"></i>
        </a>

        <!-- WhatsApp -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="bi bi-whatsapp"></i>
        </a>

        <!-- Youtube -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="bi bi-youtube"></i>
        </a>

      </section>
      <!-- Section: Social media -->

      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          Jangan menunggu sakit baru memulai pola hidup sehat. Budayakan hidup sehat untuk mencegah segala penyakit.
          Jaga kesehatanmu, perhatikan apa yang kamu makan, jangan lupa olahraga dan tidurlah tepat waktu.
        </p>
      </section>
      <!-- Section: Text -->

      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
            <h5 class="text-uppercase">Menu Lainnya</h5>
            <ul class="list-unstyled mb-0">
              @auth
                <li class=" dropdown">
                    <a class="text-decoration-none dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{auth()->user()->username}}
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
                <li>
                    <a class="text-decoration-none {{Request::is('login*') ? 'active' : ''}}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
              
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-8 mb-4 mb-md-0">
            <h5 class="text-uppercase">LINK TERKAIT</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="https://www.kemkes.go.id/" target="_blank" class="text-decoration-none">Kementrian Kesehatan RI</a>
              </li>
              <li>
                <a href="http://bppsdmk.kemkes.go.id/web/" target="_blank" class="text-decoration-none">Badan PPSDM Kesehatan</a>
              </li>
              <li>
                <a href="https://bbpkjakarta-nakes.kemkes.go.id/" target="_blank" class="text-decoration-none">Balai Besar Pelatihan Kesehatan Jakarta</a>
              </li>
              <li>
                <a href="http://bbpkciloto.or.id/web/" target="_blank" class="text-decoration-none">Balai Besar Pelatihan Kesehatan Ciloto</a>
              </li>
              <li>
                <a href="http://bbpkmakassar.or.id/" target="_blank" class="text-decoration-none">Balai Besar Pelatihan Kesehatan Makassar</a>
              </li>
              <li>
                <a href="http://bapelkescikarang.bppsdmk.kemkes.go.id/" target="_blank" class="text-decoration-none">Balai Pelatihan Kesehatan Cikarang</a>
              </li>
              <li>
                <a href="https://bapelkesbatam.id/" target="_blank" class="text-decoration-none">Balai Pelatihan Kesehatan Batam</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase text-center">KONTAK</h5>
            <div class="row">
              <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <img class="img-fluid zoom rounded" src="{{ asset('storage/default_image/maps.jpg')}}" style="width: 100vh; height: 170px;" alt="">
              </div>
              <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <p>
                  <i class="bi bi-telephone"></i> Telp. (0370) 6171361
                  <br>
                  <i class="bi bi-envelope"></i> Email: Bapelkesmataram@gmail.com
                  <br>
                  Jl. Gora 2 No.2, Selagalas, Kota Mataram, Nusa Tenggara Barat. 83237
                </p>
                <a class="btn btn-success" target="_blank" href="https://www.google.com/maps/place/BAPELKES+NASIONAL+NTB/@-8.5724679,116.1493034,16.75z/data=!4m5!3m4!1s0x2dcdc75ad97354e3:0x83a4210cf2a31285!8m2!3d-8.5741878!4d116.1504365"><i class="bi bi-geo-alt"></i> Go to Maps</a>
               </div>
            </div>
            
            
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-decoration-none" style="color: #85FFBD">Bapelkes Mataram</a>
      </div>
  </footer>