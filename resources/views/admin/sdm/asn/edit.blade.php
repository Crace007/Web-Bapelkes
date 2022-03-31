@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Data Kepegawaian</h1>
    <a href="/admin/users" class="link-secondary"><span data-feather="arrow-left"></span> Back to profile</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/employees/{{$data->id}}" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="nip" class="form-label">NIP</label>
          <input type="number" class="form-control @error('nip') is-invalid @enderror " id="nip" name="nip" value="{{old('nip', $data->nip)}}" required autofocus >
          @error('nip')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="Category" class="form-label">Pangkat</label>
          <select class="form-select" name="pangkat_id">
            <option value="{{null}}">-- SELECT ONE --</option>
              @foreach ($rankcategories as $category)
                @if (old('pangkat_id', $data->pangkat_id) == $category->id)
                  <option value="{{$category->id}}" selected> {{$category->nama_pangkat}} </option>
                @else
                  <option value="{{$category->id}}"> {{$category->nama_pangkat}} </option>
                @endif
              @endforeach
          </select>
          @error('pangkat_id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="tanggal_pangkat" class="form-label">Tanggal Pangkat</label>
          <input type="date" class="form-control @error('tanggal_pangkat') is-invalid @enderror " id="tanggal_pangkat" name="tanggal_pangkat" value="{{old('tanggal_pangkat', $data->tanggal_pangkat)}}" required >
          @error('tanggal_pangkat')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        
        <div class="mb-3">
            <label for="Category" class="form-label">Jabatan</label>
            <select class="form-select" name="jabatan_id">
              <option value="{{null}}">-- SELECT ONE --</option>
                @foreach ($jobcategories as $category)
                  @if (old('jabatan_id', $data->jabatan_id) == $category->id)
                    <option value="{{$category->id}}" selected> {{$category->nama_jabatan}} </option>
                  @else
                    <option value="{{$category->id}}"> {{$category->nama_jabatan}} </option>
                  @endif
                @endforeach
            </select>
            @error('jabatan_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="masaKerja_thn" class="form-label">Masa Kerja Tahun</label>
              <input type="number" class="form-control @error('masaKerja_thn') is-invalid @enderror " id="masaKerja_thn" name="masaKerja_thn" value="{{old('masaKerja_thn', $data->masaKerja_thn)}}" required>
              @error('masaKerja_thn')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="masaKerja_bln" class="form-label">Masa Kerja bulan</label>
              <input type="number" class="form-control @error('masaKerja_bln') is-invalid @enderror " id="masaKerja_bln" name="masaKerja_bln" value="{{old('masaKerja_bln', $data->masaKerja_bln)}}" required >
              @error('masaKerja_bln')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="latihanJabatan_diklat" class="form-label">Pendidikan & Latihan Jabatan (Diklat)</label>
              <input type="text" class="form-control @error('latihanJabatan_diklat') is-invalid @enderror " id="latihanJabatan_diklat" name="latihanJabatan_diklat" value="{{old('latihanJabatan_diklat', $data->latihanJabatan_diklat)}}">
              @error('latihanJabatan_diklat')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="latihanJabatan_tahun" class="form-label">Pendidikan & Latihan Jabatan (Tahun)</label>
              <input type="text" class="form-control @error('latihanJabatan_tahun') is-invalid @enderror " id="latihanJabatan_tahun" name="latihanJabatan_tahun" value="{{old('latihanJabatan_tahun', $data->latihanJabatan_tahun)}}">
              @error('latihanJabatan_tahun')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
          </div>
        </div>
        
        <div class="mb-3">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror " id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{old('pendidikan_terakhir', $data->pendidikan_terakhir)}}" required >
            @error('pendidikan_terakhir')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror " id="keterangan" name="keterangan" value="{{old('keterangan', $data->keterangan)}}">
            @error('keterangan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="foto_pegawai" class="form-label">Foto Pegawai</label>
          <br>
          <img src="{{asset('storage/'.$data->foto_pegawai)}}" class="mt-2 img-preview img-fluid mb-3 col-sm-3" alt="">
          <input type="file" class="form-control @error('foto_pegawai') is-invalid @enderror" id="image" name="foto_pegawai" onchange="previewImage()">
          @error('foto_pegawai')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary mb-3">Edit Data</button>
        </div>
    </form>
</div>

@endsection