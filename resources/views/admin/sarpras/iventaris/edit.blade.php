@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Data Mitra</h1>
    <a href="/admin/iventaris/{{$data->id}}" class="link-secondary"><span data-feather="arrow-left"></span> Back to Iventaris</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/iventaris/{{$data->id}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama', $data->nama)}}" required autofocus >
          @error('nama')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Merk / Type</label>
          <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type', $data->type)}}">
          @error('type')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="kode_barang" class="form-label">No. Kode Barang</label>
                    <input type="text" class="form-control @error('kode_barang') is-invalid @enderror " id="kode_barang" name="kode_barang" value="{{old('kode_barang', $data->kode_barang)}}" required >
                    @error('kode_barang')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="kode_lokasi" class="form-label">No. Kode Lokasi Barang</label>
                    <input type="text" class="form-control @error('kode_lokasi') is-invalid @enderror " id="kode_lokasi" name="kode_lokasi" value="{{old('kode_lokasi', $data->kode_lokasi)}}"  >
                    @error('kode_lokasi')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="nup" class="form-label">NUP</label>
            <input type="text" class="form-control @error('nup') is-invalid @enderror" id="title" name="nup" value="{{old('nup', $data->nup)}}">
            @error('nup')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thn_pembelian" class="form-label">Tahun Pembelian</label>
            <input type="number" class="form-control @error('thn_pembelian') is-invalid @enderror" id="title" name="thn_pembelian" value="{{old('thn_pembelian', $data->thn_pembelian)}}" required autofocus >
            @error('thn_pembelian')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="title" name="jumlah" value="{{old('jumlah', $data->jumlah)}}" required autofocus >
            @error('jumlah')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga pembelian</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="title" name="harga" value="{{old('harga', $data->harga)}}" required autofocus >
            @error('harga')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi Barang</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kondisi" id="kondisi1" value="b" {{($data->kondisi === 'b') ? 'checked' : ''}}>
                <label class="form-check-label" for="kondisi1">
                  B
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kondisi" id="kondisi2" value="rr" {{($data->kondisi === 'rr') ? 'checked' : ''}}>
                <label class="form-check-label" for="kondisi2">
                  RR
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kondisi" id="kondisi3" value="rb" {{($data->kondisi === 'rb') ? 'checked' : ''}}>
                <label class="form-check-label" for="kondisi3">
                  RB
                </label>
            </div>
            @error('kondis')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="title" name="keterangan" value="{{old('keterangan', $data->keterangan)}}">
            @error('keterangan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary mb-3">Update Data</button>
        </div>
      </form>
</div>

@endsection