<div class="card-title text-center">
    <h3>Change Email</h3>
</div>
<div class="card-body">
    <form id="formchangeemail" action="/admin/users/setting/email/{{auth()->user()->slug}}" method="post" enctype="multipart/form-data">      
      @csrf     
        <h5>Email Lama : {{auth()->user()->email}}</h5>   
        <input type="hidden" id="slug_old2" name="slug_old2" value="{{auth()->user()->slug}}">   
        <div class="mb-3">
            <label for="email" class="form-label"><Strong>Email Baru</Strong></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{old('email')}}" required autofocus >
            @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password2" class="form-label"> <strong>Konfirmasi Passoword</strong></label>
            <input type="password2" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2" value="{{old('password2')}}" required autocomplete="on">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="showPassword2">
              <label class="form-check-label" for="showPassword2">
                Show Password
              </label>
            </div>
            @error('password2')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-primary" id="btn_UploadEmail"><span data-feather="save"></span> Save Change</button>
          </div>
    </form>
</div>