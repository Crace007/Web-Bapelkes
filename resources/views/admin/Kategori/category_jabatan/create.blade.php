@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Create New Category Jabatan</h1>
    <a href="/admin/jobcategories" class="link-secondary"><span data-feather="arrow-left"></span> Back to Info Categories Page</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/jobcategories" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_jabatan" class="form-label">Title Name</label>
          <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror " id="title" name="nama_jabatan" value="{{old('nama_jabatan')}}" required autofocus >
          @error('nama_jabatan')
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
        <button type="submit" class="btn btn-primary">Add Categories</button>
      </form>
</div>

@endsection