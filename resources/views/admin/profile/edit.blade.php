@extends('admin.layouts.main')
@section('content')
    <div class="col-lg-8">
        <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mb-2">Edit User Profile</h1>
            <a href="/admin/users" class="link-secondary"><span data-feather="arrow-left"></span> Back to Profile Page</a>
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
        <form method="post" action="/admin/users/{{ $user->username }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><Strong>Name</Strong></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name', $user->name)}}" required >
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="tempat_lahir" class="form-label"><Strong>Tempat Lahir</Strong></label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror " id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir', $user->tempat_lahir)}}" required >
                        @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label"><Strong>Tanggal Lahir</Strong></label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror " id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir', $user->tanggal_lahir)}}" required >
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label"><Strong>Jenis Kelamin</Strong></label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" {{ ($user->jenis_kelamin === 'laki-laki') ? 'checked' : ''}}>
                    <label class="form-check-label" for="jenis_kelamin1">
                      Laki - Laki
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="perempuan" {{ ($user->jenis_kelamin === 'perempuan') ? 'checked' : ''}}>
                    <label class="form-check-label" for="jenis_kelamin2">
                      Perempuan
                    </label>
                  </div>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status_hubungan" class="form-label"><strong>Status Hubungan</strong></label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_hubungan" id="status_hubungan1" value="menikah" {{ ($user->status_hubungan === 'menikah') ? 'checked' : ''}}>
                    <label class="form-check-label" for="status_hubungan1">
                      Menikah
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_hubungan" id="status_hubungan2" value="lanjang" {{ ($user->status_hubungan === 'lanjang') ? 'checked' : ''}}>
                    <label class="form-check-label" for="status_hubungan2">
                      Lanjang
                    </label>
                  </div>
                @error('status_hubungan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="about" class="form-label"><Strong>About</Strong></label>
                <div class="card p-2">
                    <input type="hidden" name="about" class="text-white" id="about" value="{{ old('about', $user->about) }}">
                    <trix-editor input="about"></trix-editor>
                </div>
                @error('about')
                    <p class="text-danger">The body field is required</p>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Edit User Profile</button>
            </div>
        </form>
    </div>
@endsection