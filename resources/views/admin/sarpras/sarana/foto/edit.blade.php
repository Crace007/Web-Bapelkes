<form action="" id="FormFotosarana" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="hidden" name="sarana_id" value="{{$data->sarana_id}}">
    <div class="mb-3">
        <label for="nama" class="form-label">Keterangan</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama', $data->nama)}}" required>
        @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
    <label for="foto" class="form-label">Foto Baru</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror mb-2" id="foto" name="foto" value="{{old('foto', $data->foto)}}" required>
    <div class="mb-1">Foto Sekarang</div>
    <img src="{{asset('storage/'. $data->foto)}}" alt="" height="100px" width="auto">
    @error('foto')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="text-end">
        <button class="btn btn-primary text-end btn-sm" onclick="fotoSarana('update','{{$data->id}}','{{$data->sarana_id}}')" id="btn_Savefotosarana"><span data-feather="plus"></span> Ubah Data </button>
        <button class="btn btn-warning btn-sm text-end" onclick="cancelfotosarana()">Cancel</button>
    </div>
</form>
    <div class="text-center">
        <div id="report"></div>
    </div>
</div>