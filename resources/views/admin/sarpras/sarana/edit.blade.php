@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Ubah Data Sarana</h1>
    <a href="/admin/sarana" class="link-secondary"><span data-feather="arrow-left"></span> Back to Data Sarana</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/sarana/{{$data->slug}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Sarana</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="title" name="nama" value="{{old('nama', $data->nama)}}" required autofocus >
          @error('nama')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $data->slug)}}" required readonly>
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah Ruangan</label>
          <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{old('jumlah', $data->jumlah)}}">
          @error('jumlah')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas Per Unit</label>
            <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" value="{{old('kapasitas', $data->kapasitas)}}">
            @error('kapasitas')
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