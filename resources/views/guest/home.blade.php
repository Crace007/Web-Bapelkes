@extends('guest.layouts.menu')
@section('content')

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1300x450?personal" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Halaman depan Bapelkes Mataram</h3>
                    <p>jl. Gora 2 Selagalas Mataram</p>
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
        <div class="col-sm-8 mt-1">
            <h4 class="font-size:30px bg-dark text-white text-center">Berita Terbaru</h4>
            @foreach ($posts as $post)
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href=""><img src="https://source.unsplash.com/170x110?{{$post->category->name}}" alt="Los Angeles" width="170" height="120"></a>
                        </div>
                        <div class="col-sm-9">
                            <h4 class="card-title"><a href="#">{{$post->title}}</a></h4>
                            <div class="text-secondary">Last updated  {{$post->created_at->diffForHumans()}}</div>
                            <p class="card-text">{{$post->excerpt}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-2 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-sm-4 mt-1">
            <h4 class="font-size:30px bg-dark text-white text-center">Profile Bapelkes Mataram</h4>
            <div class="card col">
                <img class="card-img-top" src="https://source.unsplash.com/300x250?person" alt="Card image" >
                <div class="card-body col">
                    <h4 class="card-title">Kepala Bapelkes Mataram</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-danger ml-2" style="width:330px">
                <i class="fab fa-instagram"> instagram</i>
            </button>
            <button type="button" class="btn btn-primary mt-1 ml-2" style="width:330px">
                <i class="fab fa-facebook-square"> Facebook</i>
            </button>
            <button type="button" class="btn btn-info mt-1 ml-2" style="width:330px">
                <i class="fab fa-twitter-square"> Twitter</i>
            </button>
            <p></p>
        </div>
    </div>
    <br>

@endsection