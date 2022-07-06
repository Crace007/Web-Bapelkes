@extends('guest.layouts.menu')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mb-2" data-bs-ride="carousel">
        <div class="carousel-inner" style=" border-radius: 25px;">
            @if ($baner != null)
                @foreach ($baner as $item)
                    @if ($loop->first)
                        <div class="carousel-item active">
                    @else
                        <div class="carousel-item">
                    @endif
                        <img src="{{ asset('storage/' . $item->image) }}" class="d-block rounded w-100" height="450" alt="...">
                        <div class="carousel-caption">
                            <div class="d-flex align-items-center p-0">
                                <div class="text-center flex-fill p-2 opacity-3" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 25px;">
                                    <h3>{{$item->title}}</h3>
                                    <p>{!! $item->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="{{ asset('storage/default_image/baner-noimg.png')}}" class="d-block rounded w-100" height="450" alt="...">
                    <div class="carousel-caption">
                        <div class="d-flex align-items-center p-0">
                            <div class="text-center flex-fill p-2 opacity-3" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 25px;">
                                <h3>no image</h3>
                                <p>no data</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="card mt-2 mb-2">
        <div class="row text-center">
            <div class="col-md">
                <img class="mt-3" src="{{ asset('storage/default_image/kantor.png')}}" alt="Card image" width="100px" height="80px">
                <h4 class="card-title mt-2">Bapelkes Mataram</h4>
                <div class="card-text mb-2">Balai Pelatihan Kesehatan Mataram adalah tempat pelatihan kesehatan yang telah terakreditasi</div>
            </div>
            <div class="col-md">
                <img class="mt-3" src="{{ asset('storage/default_image/pis.png')}}" alt="Card image" width="100px" height="80px">
                <h4 class="card-title mt-2">PIS Bapelkes Mataram</h4>
                <div class="card-text mb-2">Profesional Inovatif Solid adalah slogan Bapelkes Mataram</div>
            </div>
            <div class="col-md">
                <img class="mt-3" src="{{ asset('storage/default_image/wbk.png')}}" alt="Card image" width="100px" height="80px">
                <h4 class="card-title mt-2">Wilayah Bebas Korupsi</h4>
                <div class="card-text mb-2">Membangun Wilayah Bebas dari Korupsi (WBK) dan Wilayah Birokrasi Bersih Melayani (WBBM)</div>
            </div>
        </div>
    </div>
            
    <div class="row ">
        <div class="col-lg-9">
            <div class="card bg-dark text-center text-white mb-1">
                <h4 class="font-size:30px">Berita Terbaru</h4>
            </div>
            <div class="list-post">
                @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="card text-dark mb-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                @if (!$imagepost->isEmpty())
                                    @foreach ($imagepost as $img)

                                        @if ($img->post_id === $post->id)
                                            <a href="/show/{{$post->slug}}"><img class="img-list-post rounded img-fluid w-100" src="{{asset('storage/'. $img->file_name)}}" alt="Los Angeles"></a>
                                            @break                                        
                                        @endif
                                        
                                        @if ($loop->last)
                                            <a href="/show/{{$post->slug}}"><img class="img-list-post rounded img-fluid w-100" src="https://source.unsplash.com/300x250?general" alt="Los Angeles"></a>
                                        @endif

                                    @endforeach
                                @else
                                    <a href="/show/{{$post->slug}}"><img class="img-list-post rounded img-fluid w-100" src="https://source.unsplash.com/300x250?news" alt="Los Angeles"></a>     
                                @endif
                                    
                                </div>
                                <div class="col">
                                    <h4 class="card-title"><a href="/show/{{$post->slug}}" class="text-decoration-none" style="text-transform: uppercase">{{$post->title}}</a></h4>
                                    <div class="text-secondary">Last updated  {{ $post->created_at->diffForHumans()}}</div>
                                    <p class="card-text">{{$post->excerpt}}</p>
                                    <a href="/show/{{$post->slug}}" class="link-secondary">Read More <i class="bi bi-caret-right-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <p class="text-center fs-4">No Post Found</p> 
                @endif
                <div class="mt-2 d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-dark text-center text-white mb-1">
                <h4 class="font-size:30px">Profile</h4>
            </div>
            <div class="card col">
                <img class="card-img-top" src="{{ asset('storage/default_image/pak_kepala.jpeg')}}" alt="Card image" width="300" height="250" style="object-fit: cover; object-position: 100% 25%">
                <div class="card-body col">
                    <h4 class="card-title text-center">Kepala Bapelkes Mataram</h4>
                    <p class="card-text">Ali Wardana</p>
                </div>
            </div>
            <div class="list-post">
                <a href="#" class="text-decoration-none">
                    <div class="card col mt-2" style="background-color: rgb(15, 84, 68)">
                        <div class="card-body col">
                            <h5 class="card-title text-white text-center">Pengaduan Masyarakat</h5>
                            <p class="card-text text-center text-white">Adukan keluhan anda disini</p>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none">
                    <div class="card col mt-2" style="background-color: rgb(21, 41, 158)">
                        <div class="card-body col">
                            <h5 class="card-title text-white text-center">Survei Kepuasan Pelayanan</h5>
                            <p class="card-text text-center text-white">Adukan keluhan anda disini</p>
                        </div>
                    </div>
                </a>

            </div>
            
            
        </div>
    </div>
    <br>

@endsection