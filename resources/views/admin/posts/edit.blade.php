@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Edit Post</h1>
    <a href="/admin/posts" class="link-secondary"><span data-feather="arrow-left"></span> Back to Post Page</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('title', $post->title)}}" required >
          @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $post->slug)}}" required >
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="Category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
              @foreach ($categories as $category)
                @if (old('category_id', $post->category_id) == $category->id)
                  <option value="{{$category->id}}" selected> {{$category->name}} </option>
                @else
                  <option value="{{$category->id}}"> {{$category->name}} </option>
                @endif
              @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <input type="hidden" name="oldImage" value="{{$post->image}}">
          @if ($post->image)
            <img src=" {{ asset('storage/'. $post->image) }} " class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
          @else
            <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
          @endif
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body)}}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-danger">The body field is required</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Post</button>
      </form>
</div>
@endsection