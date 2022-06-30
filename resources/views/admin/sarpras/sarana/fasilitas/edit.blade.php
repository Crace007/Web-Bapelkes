<form action="" id="FormSaranaFasilitas" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="hidden" name="sarana_id" value="{{$data->sarana_id}}">
    <div class="mb-3">
        <label for="fasilitas" class="form-label">Nama Fasilitas</label>
        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" value="{{old('fasilitas', $data->fasilitas)}}" required>
        @error('fasilitas')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
    <label for="unit" class="form-label">Jumlah Unit</label>
    <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" value="{{old('unit', $data->unit)}}">
    @error('unit')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="text-end">
        <button class="btn btn-primary text-end btn-sm" onclick="fasilitasSarana('update','{{$data->id}}','{{$data->sarana_id}}')" id="btn_SaveFasilitasPelatihan"><span data-feather="plus"></span> Ubah Materi </button>
        <button class="btn btn-warning btn-sm text-end" onclick="cancelFasilitas()">Cancel</button>
    </div>
</form>
    <div class="text-center">
        <div id="report"></div>
    </div>
</div>