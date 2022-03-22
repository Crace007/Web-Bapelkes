@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Edit Category</h1>
    <a href="/admin/categories" class="link-secondary"><span data-feather="arrow-left"></span> Back to Categories Page</a>
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
    <form method="post" action="/admin/infocategories/{{ $category->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="name" value="{{old('name', $category->name)}}" required >
          @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $category->slug)}}" required >
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Post</button>
      </form>
</div>
@endsection