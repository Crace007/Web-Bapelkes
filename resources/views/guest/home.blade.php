@extends('guest.layouts.menu')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mb-1 mt-1" data-bs-ride="carousel">
        <div class="carousel-inner">
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
                                <div class="text-center flex-fill p-2 opacity-3" style="background-color: rgba(0, 0, 0, 0.7)">
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
                            <div class="text-center flex-fill p-2 opacity-3" style="background-color: rgba(0, 0, 0, 0.7)">
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

    <div class="row">
        <div class="col-lg-9">
            <div class="card bg-dark text-center text-white mb-1">
                <h4 class="font-size:30px">Berita Terbaru</h4>
            </div>
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                @if (!$imagepost->isEmpty())
                                    @foreach ($imagepost as $img)

                                        @if ($img->post_id === $post->id)
                                            <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-100" src="{{asset('storage/'. $img->file_name)}}" alt="Los Angeles"></a>
                                            @break                                        
                                        @endif
                                        
                                        @if ($loop->last)
                                            <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-100" src="https://source.unsplash.com/300x250?general" alt="Los Angeles"></a>
                                        @endif

                                    @endforeach
                                @else
                                    <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-100" src="https://source.unsplash.com/300x250?news" alt="Los Angeles"></a>     
                                @endif
                                    
                                </div>
                                <div class="col">
                                    <h4 class="card-title"><a href="/show/{{$post->slug}}" class="text-decoration-none text-dark">{{$post->title}}</a></h4>
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
        <div class="col-lg-3">
            <div class="card bg-dark text-center text-white mb-1">
                <h4 class="font-size:30px">Profile</h4>
            </div>
            @if ($kepala != null)
                <div class="card col">
                    <img class="card-img-top" src="{{ asset('storage/' . $kepala->image) }}" alt="Card image" width="300" height="250">
                    <div class="card-body col">
                        <h4 class="card-title">{{$kepala->title}}</h4>
                        <p class="card-text">{!! $kepala->description !!}</p>
                    </div>
                </div>
            @else
                <div class="card col">
                    <img class="card-img-top" src="{{ asset('storage/default_image/kepala-noimg.jpg')}}" alt="Card image" >
                    <div class="card-body col">
                        <h4 class="card-title">data not found</h4>
                        <p class="card-text">no data</p>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
    <br>

@endsection