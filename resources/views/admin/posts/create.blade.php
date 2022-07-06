@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Create New Post</h1>
    <a href="/admin/profile" class="link-secondary"><span data-feather="arrow-left"></span> Back to profile</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label"><Strong>Title</Strong></label>
          <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('title')}}" required autofocus >
          @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label"><strong>Slug</strong></label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" required  readonly>
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="dateactivity" class="form-label"> <strong>Date Activity</strong></label>
          <input type="date" class="form-control @error('dateactivity') is-invalid @enderror" id="dateactivity" name="dateactivity" value="{{old('dateactivity')}}" required >
          @error('dateactivity')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="Category" class="form-label"><strong>Category</strong></label>
          <select class="form-select" name="category_id">
            <option value="{{null}}" disabled selected>-- SELECT ONE --</option>
              @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
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
          <label for="image" class="form-label"> <strong>Post Image</strong></label>
          <input type="file" class="form-control @error('file_name') is-invalid @enderror" id="image" name="file_name[]" multiple onchange="previewImage()">
          <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
          @error('file_name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label"> <strong>Body</strong> </label>
            <div class="card p-2">
              <input type="hidden" name="body" id="body" value="{{ old('body') }}">
              <trix-editor input="body"></trix-editor>
            </div>
            @error('body')
                <p class="text-danger">The body field is required</p>
            @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary mb-3">Posting <span data-feather="send"></span></button>
        </div>
      </form>
</div>

@endsection