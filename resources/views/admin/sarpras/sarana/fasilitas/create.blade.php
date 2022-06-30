<form action="" id="FormSaranaFasilitas" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="sarana_id" value="{{ request('sarana') }}">
    <div class="mb-3">
    <label for="fasilitas" class="form-label">Nama Fasilitas</label>
    <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" value="{{old('fasilitas')}}" required>
    @error('fasilitas')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="mb-3">
    <label for="unit" class="form-label">Jumlah Unit</label>
    <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" value="{{old('unit')}}">
    @error('unit')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="text-end">
        <button class="btn btn-primary text-end btn-sm" onclick="fasilitasSarana('create','','{{request('sarana')}}')" id="btn_SaveFasilitas"><span data-feather="plus"></span> tambah Fasilitas </button>
        <button class="btn btn-warning btn-sm text-end" onclick="cancelFasilitas()">Cancel</button>
    </div>
</form>
    <div class="text-center">
        <div id="report"></div>
    </div>
</div>