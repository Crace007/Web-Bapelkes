@extends('guest.layouts.menu')
@section('content')
<div class="row mt-2">
    <div class="col-lg-8 mb-2">
        <div class="card">
            <div class="card-body">
                <article>
                    <h3 class="">{{$post->title}}</h3>
                    <small class="text-muted">By : <a href="/posts?author={{$post->user->username}}" class="text-decoration-none text-dark">{{$post->user->name}}</a>,</small>
                    <small class="text-muted">Kategory : <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none text-dark">{{$post->category->name}}</a></small>
                    <hr>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $postimg[0]->file_name) }}" class="d-block rounded w-100" height="350" alt="...">
                            </div>
                            @foreach ($postimg->skip(1) as $image)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $image->file_name) }}" class="d-block rounded w-100" height="350" alt="...">
                                </div>
                            @endforeach
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="mt-3">{!! $post->body !!} </p>
                </article>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="card bg-dark text-center text-white mb-1">
                    <h4 class="font-size:30px">Berita Terbaru</h4>
                </div>
                @foreach ($posts as $p)
                    @if ($p->id === $post->id)
                        @continue
                    @else
                    <div class="card mb-1">
                        @foreach ($imageposts as $img)
                            @if ($img->post_id === $p->id)
                                <a href="/show/{{$p->slug}}" class="text-center">
                                    <img src="{{asset('storage/' . $img->file_name)}}" class="img-fluid rounded-start w-50 h-50" alt="...">
                                </a>
                                @break                                        
                            @endif
                            
                            @if ($loop->last)
                                <a href="/show/{{$p->slug}}" class="text-center">
                                    <img class="rounded-start img-fluid w-50 h-50" src="https://source.unsplash.com/265x150?general" alt="Los Angeles">
                                </a>
                            @endif
                        @endforeach
                        
                        <div class="card-body">
                            <b class="card-title"><a href="/show/{{$p->slug}}" class="text-decoration-none text-dark">{{$p->title}}</a></b>
                            <p class="card-text"><small>{{$p->excerpt}}</small></p>
                        </div>
                    </div>

                    {{-- <div class="card" style="max-width: 540px;">
                        <div class="row g-0">
                        <div class="col-md-4">
                            @foreach ($imageposts as $img)
                                @if ($img->post_id === $p->id)
                                    <a href="/show/{{$p->slug}}">
                                        <img src="{{asset('storage/' . $img->file_name)}}" class="img-fluid rounded-start" alt="...">
                                    </a>
                                    @break                                        
                                @endif
                                
                                @if ($loop->last)
                                    <a href="/show/{{$p->slug}}">
                                        <img class="rounded-start img-fluid" src="https://source.unsplash.com/300x250?general" alt="Los Angeles">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                        </div>
                    </div> --}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<br>

    
@endsection