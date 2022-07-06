@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Edit Post</h1>
    <a href="/admin/users" class="link-secondary"><span data-feather="arrow-left"></span> Back to Profile</a>
</div>
@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (session()->has('destroy'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('destroy')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
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
          <label for="dateactivity" class="form-label"> <strong>Date Activity</strong></label>
          <input type="date" class="form-control @error('dateactivity') is-invalid @enderror" id="dateactivity" name="dateactivity" value="{{old('dateactivity', $post->dateactivity)}}" required >
          @error('dateactivity')
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
          @error('category_id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <input type="file" class="form-control @error('file_name') is-invalid @enderror" id="image" name="file_name[]" multiple onchange="previewImage()">
          @error('file_name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="row">      
          @foreach ($postimg as $image)
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div style="max-height: 500px; overflow: hidden; ">
                  <img class="card-img-top  img-fluid" src="{{ asset('storage/' . $image->file_name) }}" alt="...">
                </div>
                <div class="card-body text-center">
                  <!-- Button Remove trigger modal -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$image->id}}">
                    <span data-feather="trash"></span> Remove
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal-{{$image->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          Are you sure want to remove this image ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary border-0" data-bs-dismiss="modal">Cancel</button>
                          <a href="/admin/posts/remove/{{$image->id}}" class="btn btn-success border-0">Confirm</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          @endforeach
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">body</label>
            <div class="card p-2">
              <input id="body" type="hidden" name="body" value="{{ old('body', $post->body)}}">
              <trix-editor input="body"></trix-editor>
            </div>
            @error('body')
                <p class="text-danger">The body field is required</p>
            @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary mb-3">Edit Post</button>
        </div>
      </form>
</div>
@endsection