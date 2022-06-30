<div class="card-title text-center">
    <h3>Change Password</h3>
</div>
<div class="card-body">
    <form id="formchangepassword" action="/admin/users/setting/password/{{auth()->user()->slug}}"  method="post" enctype="multipart/form-data">      
      @csrf
      <input type="hidden" id="slug_old3" name="slug_old3" value="{{auth()->user()->slug}}">   
        <div class="mb-3">
            <label for="password" class="form-label"><Strong>password Baru</Strong></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" value="{{old('password')}}" required autofocus autocomplete="on">
            @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password3" class="form-label"> <strong>Konfirmasi Passoword Lama</strong></label>
            <input type="password" class="form-control @error('password3') is-invalid @enderror" id="password3" name="password3" value="{{old('password3')}}" required autocomplete="on">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="showPassword3">
              <label class="form-check-label" for="showPassword3">
                Show Password
              </label>
            </div>
            @error('password3')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-primary" id="btn_UploadPassword"><span data-feather="save"></span> Save Change</button>
          </div>
    </form>
</div>