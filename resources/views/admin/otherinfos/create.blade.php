@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Create New Post</h1>
    <a href="/admin/otherinfos" class="link-secondary"><span data-feather="arrow-left"></span> Back to Post Page</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/otherinfos" enctype="multipart/form-data">
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
          <label for="Category" class="form-label">Category</label>
          <select class="form-select" name="infocategory_id">
            <option value="{{null}}">-- SELECT ONE --</option>
              @foreach ($infocategories as $category)
                @if (old('infocategory_id') == $category->id)
                  <option value="{{$category->id}}" selected> {{$category->name}} </option>
                @else
                  <option value="{{$category->id}}"> {{$category->name}} </option>
                @endif
              @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Info Image</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" multiple onchange="previewImage()">
          <img src="" class="mt-2 img-preview img-fluid mb-3 col-sm-3" alt="">
          @error('image')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input id="description" type="hidden" name="description" value="{{ old('description') }}">
            <trix-editor input="description"></trix-editor>
            @error('description')
                <p class="text-danger">The body field is required</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
      </form>
</div>

@endsection