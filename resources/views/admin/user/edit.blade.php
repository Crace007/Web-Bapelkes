@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Create New User</h1>
    <a href="/admin/info/users" class="link-secondary"><span data-feather="arrow-left"></span> Back to List User</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/info/users/{{$data->slug}}" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label"><Strong>Nama</Strong></label>
          <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name', $data->name) }}" required >
          @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="username" class="form-label"><Strong>Username</Strong></label>
          <input type="text" class="form-control @error('username') is-invalid @enderror " id="title" name="username" value="{{old('username', $data->username)}}" required >
          @error('username')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label"><strong>Slug</strong></label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $data->slug)}}" required  readonly>
            @error('slug')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label"><strong>Email Address </strong></label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email',  $data->email)}}" required>
          @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="tempat_lahir" class="form-label"><Strong>Tempat Lahir</Strong></label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror " id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir', $data->tempat_lahir)}}" required >
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label"><Strong>Tanggal Lahir</Strong></label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror " id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir', $data->tanggal_lahir)}}" required >
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
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" {{ ($data->jenis_kelamin === 'laki-laki') ? 'checked' : ''}}>
                <label class="form-check-label" for="jenis_kelamin1">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="perempuan" {{ ($data->jenis_kelamin === 'perempuan') ? 'checked' : ''}}>
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
            <label for="umur" class="form-label"><strong>Umur</strong></label>
            <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{old('umur', $data->umur)}}" required>
            @error('umur')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status_pekerjaan" class="form-label"><strong>Status Pekerjaan</strong></label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_pekerjaan" id="status_pekerjaan1" value="ASN" {{ ($data->status_pekerjaan === 'ASN') ? 'checked' : ''}}>
                <label class="form-check-label" for="status_pekerjaan1">
                  ASN
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_pekerjaan" id="status_pekerjaan2" value="P3K" {{ ($data->status_pekerjaan === 'P3K') ? 'checked' : ''}}>
                <label class="form-check-label" for="status_pekerjaan2">
                  P3K
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_pekerjaan" id="status_pekerjaan3" value="THL" {{ ($data->status_pekerjaan === 'THL') ? 'checked' : ''}}>
                <label class="form-check-label" for="status_pekerjaan3">
                  THL
                </label>
              </div>
            @error('status_pekerjaan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status_hubungan" class="form-label"><strong>Status Hubungan</strong></label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_hubungan" id="status_hubungan1" value="Menikah" {{ ($data->status_hubungan === 'Menikah') ? 'checked' : ''}}>
                <label class="form-check-label" for="status_hubungan1">
                  Menikah
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_hubungan" id="status_hubungan2" value="Lanjang" {{ ($data->status_hubungan === 'Lanjang') ? 'checked' : ''}}>
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
          <label for="password" class="form-label"> <strong>Password</strong></label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="showPassword">
            <label class="form-check-label" for="showPassword">
              Show Password
            </label>
          </div>
          @error('password')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        
        <div class="text-end">
          <button type="submit" class="btn btn-primary"><span data-feather="plus"></span> Ubah Data</button>
        </div>
      </form>
</div>

@endsection