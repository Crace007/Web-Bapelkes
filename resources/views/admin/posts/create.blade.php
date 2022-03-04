@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Create New Post</h1>
    <a href="/admin/posts" class="link-secondary"><span data-feather="arrow-left"></span> Back to Post Page</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('title')}}" required autofocus >
          @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" required >
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
                @if (old('category_id') == $category->id)
                  <option value="{{$category->id}}" selected> {{$category->name}} </option>
                @else
                  <option value="{{$category->id}}"> {{$category->name}} </option>
                @endif
              @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-danger">The body field is required</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
      </form>
</div>

@endsection