@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Edit Jadwal Pelatihan</h1>
    <a href="/admin/trainingschedule" class="link-secondary"><span data-feather="arrow-left"></span> Back to data pelatihan</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/trainingschedule/{{$pelatihan->id}}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
          <input type="text" class="form-control @error('nama_pelatihan') is-invalid @enderror " id="title" name="nama_pelatihan" value="{{old('nama_pelatihan', $pelatihan->nama_pelatihan)}}" required autofocus >
          @error('nama_pelatihan')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $pelatihan->slug)}}" required >
            @error('slug')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
          <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror " id="jumlah_peserta" name="jumlah_peserta" value="{{old('jumlah_peserta', $pelatihan->jumlah_peserta)}}" required >
          @error('jumlah_peserta')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="tanggal_start" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control @error('tanggal_start') is-invalid @enderror " id="tanggal_start" name="tanggal_start" value="{{old('tanggal_start', $pelatihan->tanggal_start)}}" required >
                    @error('tanggal_start')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="tanggal_end" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control @error('tanggal_end') is-invalid @enderror " id="tanggal_end" name="tanggal_end" value="{{old('tanggal_end', $pelatihan->tanggal_end)}}" required >
                    @error('tanggal_end')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="lama_jpl" class="form-label">Lama JPL</label>
                    <input type="number" class="form-control @error('lama_jpl') is-invalid @enderror" id="lama_jpl" name="lama_jpl" value="{{old('lama_jpl', $pelatihan->lama_jpl)}}" required >
                    @error('lama_jpl')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="lama_hari" class="form-label">Lama hari</label>
                    <input type="number" class="form-control @error('lama_hari') is-invalid @enderror" id="lama_hari" name="lama_hari" value="{{old('lama_hari', $pelatihan->lama_hari)}}" required >
                    @error('lama_hari')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="metode" class="form-label">Metode</label>
            <input type="text" class="form-control @error('metode') is-invalid @enderror " id="metode" name="metode" value="{{old('metode', $pelatihan->metode)}}" required >
            @error('metode')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="instansi_penyelenggara" class="form-label">Instansi Penyelenggara</label>
            <input type="text" class="form-control @error('instansi_penyelenggara') is-invalid @enderror " id="instansi_penyelenggara" name="instansi_penyelenggara" value="{{old('instansi_penyelenggara', $pelatihan->instansi_penyelenggara)}}" required >
            @error('instansi_penyelenggara')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tempat_penyelenggaraan" class="form-label">Tempat Penyelenggaraan</label>
            <input type="text" class="form-control @error('tempat_penyelenggaraan') is-invalid @enderror " id="tempat_penyelenggaraan" name="tempat_penyelenggaraan" value="{{old('tempat_penyelenggaraan', $pelatihan->tempat_penyelenggaraan)}}" required >
            @error('tempat_penyelenggaraan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sumber_dana" class="form-label">Sumber Dana</label>
            <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror " id="sumber_dana" name="sumber_dana" value="{{old('sumber_dana', $pelatihan->sumber_dana)}}" required >
            @error('sumber_dana')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Category" class="form-label">Pengendali Pelatihan</label>
            <select class="form-select" name="pengendaliPelatihan_id">
              <option value="{{null}}">-- SELECT ONE --</option>
                @foreach ($data as $item)
                  @if (old('pengendaliPelatihan_id', $pelatihan->pengendaliPelatihan_id) == $item->id)
                    <option value="{{$item->id}}" selected> {{$item->user->name}} </option>
                  @else
                    <option value="{{$item->id}}"> {{$item->user->name}} </option>
                  @endif
                @endforeach
            </select>
            @error('pengendaliPelatihan_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Category" class="form-label">Penanggung Jawab</label>
            <select class="form-select" name="penanggungJawab_id">
              <option value="{{null}}">-- SELECT ONE --</option>
                @foreach ($data as $item)
                  @if (old('penanggungJawab_id', $pelatihan->penanggungJawab_id) == $item->id)
                    <option value="{{$item->id}}" selected> {{$item->user->name}} </option>
                  @else
                    <option value="{{$item->id}}"> {{$item->user->name}} </option>
                  @endif
                @endforeach
            </select>
            @error('penanggungJawab_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Category" class="form-label">Ketua Panitia</label>
            <select class="form-select" name="ketuaPanitia_id">
              <option value="{{null}}">-- SELECT ONE --</option>
                @foreach ($data as $item)
                  @if (old('ketuaPanitia_id', $pelatihan->ketuaPanitia_id) == $item->id)
                    <option value="{{$item->id}}" selected> {{$item->user->name}} </option>
                  @else
                    <option value="{{$item->id}}"> {{$item->user->name}} </option>
                  @endif
                @endforeach
            </select>
            @error('ketuaPanitia_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror " id="keterangan" name="keterangan" value="{{old('keterangan', $pelatihan->keterangan)}}" >
            @error('keterangan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="text-end mb-3">
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </div>
      </form>
</div>

@endsection