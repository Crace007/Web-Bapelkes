@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Create New Roles</h1>
    <a href="/admin/rolecategories" class="link-secondary"><span data-feather="arrow-left"></span> Back to Roles Page</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/rolecategories" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Role</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" value="{{old('nama')}}" required autofocus >
          @error('nama')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Roles</button>
      </form>
</div>

@endsection