@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Edit User Roles</h1>
    <a href="/admin/rules" class="link-secondary"><span data-feather="arrow-left"></span> Back to User Roles Page</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/rules/{{$user->slug}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama User</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" value="{{old('nama', $user->name)}}" required disabled>
          @error('nama')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Category</label>
            <select class="form-select" name="role_id">
                <option value="{{null}}" disabled selected>-- SELECT ONE --</option>
                @foreach ($role as $item)
                  @if (old('role_id', $user->role_id) == $item->id)
                    <option value="{{$item->id}}" selected> {{$item->nama}} </option>
                  @else
                    <option value="{{$item->id}}"> {{$item->nama}} </option>
                  @endif
                @endforeach
            </select>
            @error('role_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Edit User Roles</button>
      </form>
</div>

@endsection