@extends('guest.layouts.menu')
@section('content')

    <div id="demo" class="carousel slide my-2" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1300x450?personal" alt="Los Angeles">
                
                <div class="carousel-caption">
                    <div class="d-flex align-items-center p-0">
                        <div class="text-center flex-fill p-2 opacity-3" style="background-color: rgba(0, 0, 0, 0.7)">
                            <h3>Halaman depan Bapelkes Mataram</h3>
                            <p>memiliki taman yang cocok untuk refreshing dan mencari udara segar</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1280x350?sport" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Halaman Dalam Bapelkes Mataram</h3>
                    <p>memiliki taman yang cocok untuk refreshing dan mencari udara segar</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1110x350?technology" alt="New York">
                <div class="carousel-caption">
                    <h3>Pakaian Adat</h3>
                    <p>Salah satu kegiatan para anggota bapelkes memakai pakaian adat tradisiona lombok</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <p>
    <div class="row">
        <div class="col-lg-8">
            <div class="card bg-dark text-center text-white mb-1">
                <h4 class="font-size:30px">Berita Terbaru</h4>
            </div>
            @foreach ($posts as $post)
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                @foreach ($imagepost as $img)

                                    @if ($img->post_id === $post->id)
                                        <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-100" src="{{asset('storage/'. $img->file_name)}}" alt="Los Angeles"></a>
                                        @break                                        
                                    @endif
                                    
                                    @if ($loop->last)
                                    <a href="/show/{{$post->slug}}"><img class="rounded img-fluid" src="https://source.unsplash.com/300x250?general" alt="Los Angeles"></a>
                                    @endif

                                @endforeach
                            </div>
                            <div class="col">
                                <h4 class="card-title"><a href="/show/{{$post->slug}}" class="text-decoration-none text-dark">{{$post->title}}</a></h4>
                                <div class="text-secondary">Last updated  {{$post->created_at->diffForHumans()}}</div>
                                <p class="card-text">{{$post->excerpt}}</p>
                                <a href="/show/{{$post->slug}}" class="link-secondary">Read More <i class="bi bi-caret-right-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-2 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-dark text-center text-white mb-1">
                <h4 class="font-size:30px">Profile Bapelkes Mataram</h4>
            </div>
            <div class="card col">
                <img class="card-img-top" src="https://source.unsplash.com/300x250?person" alt="Card image" >
                <div class="card-body col">
                    <h4 class="card-title">Kepala Bapelkes Mataram</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
        </div>
    </div>
    <br>

@endsection