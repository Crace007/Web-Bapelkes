@extends('guest.layouts.menu')
@section('content')
<H1 class="mb-3 text-center">PUBLIKASI POSTING</H1>

<div class="row justify-content-center mb-2">
  <div class="col-md-6">
    <form action="/publikasi">
      @if (request('author'))
          <input type="hidden" name="author" value="{{request('author')}}">
      @endif
      @if (request('category'))
          <input type="hidden" name="category" value="{{request('category')}}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
        <div class="input-group-append">
          <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i> Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
@if ($posts->count())
    <div class="card mb-3">
        @foreach ($image as $img)
            @if ($img->post_id === $posts[0]->id)
                <img class="card-img-top img-fluid" style="object-fit: cover; object-position: 50% 70%; width: auto; height: 50vh;" src="{{ asset('storage/' . $img->file_name) }}" alt="{{$posts[0]->category->name}}">
                @break                                        
            @endif
            @if ($loop->last)
                <img class="card-img-top" src="https://source.unsplash.com/1200x400?general" alt="{{$posts[0]->category->name}}">
            @endif
        @endforeach   
        <div class="card-body text-center">
            <h4 class="card-title"><a href="/show/{{$posts[0]->slug}}" class="text-decoration-none" style="text-transform: uppercase">{{$posts[0]->title}} </a></h4>
            <small>By : <a href="/publikasi?author={{$posts[0]->user->username}}" class="text-decoration-none">{{$posts[0]->user->name}}</a></small>
            <small>Kategory : <a href="/publikasi?category={{$posts[0]->category->slug}}" class="text-decoration-none">{{$posts[0]->category->name}}</a></small>
            <p class="card-text"><small class="text-muted">Last updated  {{$posts[0]->created_at->diffForHumans()}} </small></p>
            <p class="card-text"> {{$posts[0]->excerpt}} </p>
            <a href="/show/{{$posts[0]->slug}}" class="btn btn-success text-white">Read More</a> 
        </div>           
    </div>
    <div class="container list-publish">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 15px 0px 15px 0px;"><a href="/publikasi?category={{$post->category->slug}}" class="text-decoration-none text-white">{{$post->category->name}}</a></div>   
                        @foreach ($image as $img)
                            @if ($img->post_id === $post->id)
                                <img class="card-img-top img-fluid" style="object-fit: cover; object-position: 50% 60%; width: auto; height: 200px;" src="{{ asset('storage/' . $img->file_name) }}" alt="{{$posts[0]->category->name}}">
                                @break                                        
                            @endif
                            @if ($loop->last)
                                <img class="card-img-top" src="https://source.unsplash.com/1200x400?general" alt="{{$posts[0]->category->name}}">
                            @endif
                        @endforeach 
                        <div class="card-body">
                            <h5 class="card-title"><a href="/show/{{$post->slug}}" class="text-decoration-none" style="text-transform: uppercase">{{$post->title}} </a></h5>
                            <small>By : <a href="/publikasi?author={{$post->user->username}}" class="text-decoration-none">{{$post->user->name}}</a></small>
                            <p class="card-text"><small class="text-muted">Last updated  {{$post->created_at->diffForHumans()}} </small></p>
                            <p class="card-text" style="text-align: justify">{{$post->excerpt}}</p>
                            <div class="text-end">
                                <a href="/show/{{$post->slug}}" class="btn btn-success text-white">Read More</a> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
@else
    <p class="text-center fs-4">No Post Found</p> 
@endif

@endsection