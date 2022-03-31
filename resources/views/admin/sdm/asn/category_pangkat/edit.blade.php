@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Edit Category</h1>
    <a href="/admin/rankcategories" class="link-secondary"><span data-feather="arrow-left"></span> Back to Categories Page</a>
</div>
<div class="col-lg-8">
    <form method="post" action="/admin/rankcategories/{{ $category->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_pangkat" class="form-label">Title Name</label>
          <input type="text" class="form-control @error('nama_pangkat') is-invalid @enderror " id="title" name="nama_pangkat" value="{{old('nama_pangkat', $category->nama_pangkat)}}" required >
          @error('nama_pangkat')
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