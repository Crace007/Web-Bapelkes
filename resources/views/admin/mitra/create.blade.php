@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Data Mitra</h1>
    <a href="/admin/mitra" class="link-secondary"><span data-feather="arrow-left"></span> Back to profile</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/mitra" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="title" name="nama" value="{{old('nama')}}" required autofocus >
          @error('nama')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" required readonly>
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="link" class="form-label">Link Website Instansi Mitra</label>
          <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{old('link')}}">
          @error('link')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="logo" class="form-label">Logo Mitra</label>
          <img src="" class="mt-2 img-preview img-fluid mb-3 col-sm-3" alt="">
          <input type="file" class="form-control @error('logo') is-invalid @enderror" id="image" name="logo" onchange="previewImage()">
          @error('logo')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary mb-3">Add Data</button>
        </div>
      </form>
</div>

@endsection