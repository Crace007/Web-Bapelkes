<form method="POST" action="/admin/materipelatihans/" id="FormMateriPelatihan">
  <input type="hidden" class="form-control" id="pelatihan_id" name="pelatihan_id" value="{{request('pelatihan')}}">
  <input type="hidden" class="form-control" id="upload_by" name="upload_by" value="{{request('user')}}">
  <div class="mb-3">
    <label for="nama_pelatihan" class="form-label">Judul Materi</label>
    <input type="text" class="form-control @error('nama_pelatihan') is-invalid @enderror " id="inputmateri" name="nama" required >
    @error('nama_pelatihan')
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
  </div>
  <button class="btn btn-primary btn-sm" onclick="materiPelatihan('create','','{{request('pelatihan')}}')" id="btn_SaveMateriPelatihan"><span data-feather="plus"></span> tambah materi </button>
  <button class="btn btn-warning btn-sm" onclick="cancelMateri()" id='btn_cancelMateri'>Cancel</button>
  <div class="text-center">
      <div id="report"></div>
  </div>
</form>

