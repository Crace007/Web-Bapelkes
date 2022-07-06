@extends('admin.layouts.main')
@section('content')

<div class="container">
    <div class="pt-3 pb-2 mb-3 border-bottom">
      <a href="/admin/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Post Page</a>
    @can('admin')
      <a href="/admin/posts/{{$post->slug}}/edit" class="btn btn-primary"><span data-feather="edit"></span> Edit</a>
      <form action="/admin/posts/{{$post->slug}}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span> Delete</button>
      </form>
    @endcan
    </div>
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <h1 class="mt-3">{{$post->title}}</h1>
                <p>Kategory : <a href="/blog?category={{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}}</a></p>
                @if ($postimg)
                <div class="row">
                    @foreach ($postimg as $image)
                        <div class="col-md-3">
                            <div class="card">
                                <div style="max-height: 600px; overflow: hidden; ">
                                    <img class="card-img-top  img-fluid" src="{{ asset('storage/' . $image->file_name) }}" alt="...">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div style="max-height: 300px; overflow: hidden; ">
                    <img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" alt="{{$post->category->name}}">
                </div> --}}
                @else
                    <img class="card-img-top" src="https://source.unsplash.com/1200x300?{{$post->category->name}}" alt="{{$post->category->name}}">
                @endif
                <p class="mt-3">{!! $post->body !!} </p>
            </article>
        </div>
    </div>
</div>

@endsection