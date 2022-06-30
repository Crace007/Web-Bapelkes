<form id="FileFormModalEdit" enctype="multipart/form-data">      
  @method('PUT')         
  <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" required>
  <input type="hidden" class="form-control" id="file_user_old" name="file_user_old" value="{{$data->nama_file}}">
  <div class="modal-body">
    <div class="mb-3">
      <label for="nama" class="col-form-label">Nama File:</label>
      <input type="text" class="form-control" id="title" name="nama" value="{{$data->nama}}" required>
    </div>
    <div class="mb-3">
      <label for="Category" class="form-label">Kategori File:</label>
      <select class="form-select" name="filecategory_id">
        <option value="" disabled selected>-- SELECT ONE --</option>
        @foreach ($categories as $item)
          @if (old('filecategory_id', $data->filecategory_id) == $item->id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
          @else
            <option value="{{$item->id}}">{{$item->name}}</option>  
          @endif
        @endforeach 
      </select>
    </div>
    <div class="mb-3">
      <label for="nama_file" class="col-form-label">Pilih File:</label>
      <input type="file" class="form-control" id="nama_file" name="nama_file">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="btn_UploadFile" onclick="uploadFile('update','{{ $data->id }}')">Upload</button>
  </div>
</form>
