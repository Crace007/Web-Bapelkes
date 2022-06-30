<form method="POST" action="/admin/materipelatihans/" id="FormMateriPelatihan">
    @method('PUT')
    <input type="hidden" class="form-control" id="pelatihan_id" name="pelatihan_id" value="{{$data->pelatihan_id}}">
    <input type="hidden" class="form-control" id="upload_by" name="upload_by" value="{{$data->upload_by}}">
    <div class="mb-3">
      <label for="nama_pelatihan" class="form-label">Judul Materi</label>
      <input type="text" class="form-control @error('nama_pelatihan') is-invalid @enderror " id="nama" name="nama" value="{{$data->nama}}" autofocus required >
      @error('nama_pelatihan')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="text-center">
        <div id="report"></div>
    </div>
</form>
<table>
  <tr>
    <td>
      <button class="btn btn-primary btn-sm" onclick="materiPelatihan('update','{{$data->id}}','{{$data->pelatihan_id}}')" id="btn_SaveMateriPelatihan"><span data-feather="plus"></span> Update materi </button>
      <button class="btn btn-warning btn-sm" onclick="cancelMateri()" id='btn_cancelMateri'>Cancel</button>
      <form action="/admin/materipelatihans/{{$data->id}}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">delete</button>
      </form>
    </td>
  </tr>
</table>
  
  