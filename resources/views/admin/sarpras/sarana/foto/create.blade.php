<form action="" id="FormFotosarana" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="sarana_id" value="{{ request('sarana') }}">
    <div class="mb-3">
        <label for="nama" class="form-label">Keterangan</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}" required>
        @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{old('foto')}}" required>
    @error('foto')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="text-end">
        <button class="btn btn-primary text-end btn-sm" onclick="fotoSarana('create','','{{request('sarana')}}')" id="btn_Savefotosarana"><span data-feather="plus"></span> Tambah Foto </button>
        <button class="btn btn-warning btn-sm text-end" onclick="cancelfotosarana()">Cancel</button>
    </div>
</form>
    <div class="text-center">
        <div id="report"></div>
    </div>
</div>