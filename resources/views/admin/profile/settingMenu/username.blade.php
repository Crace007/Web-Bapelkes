<div class="card-title text-center">
    <h3>Change Username</h3>
</div>
<div class="card-body">
  <form id="formchangeusername" action="/admin/users/setting/username/{{auth()->user()->slug}}" method="POST" enctype="multipart/form-data">      
    @csrf
    <h5>Username Lama : {{auth()->user()->username}}</h5>
    <input type="hidden" id="slug_old" name="slug_old" value="{{auth()->user()->slug}}">   
    <div class="mb-3">
        <label for="username" class="form-label"><Strong>Username Baru</Strong></label>
        <input type="text" class="form-control @error('username') is-invalid @enderror " id="title" name="username" value="{{old('username')}}" required autofocus >
        @error('username')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
      <div class="mb-3">
          <label for="slug" class="form-label"><strong>Slug</strong></label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" required  readonly>
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="password1" class="form-label"> <strong>Konfirmasi Passoword</strong></label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password1" name="password1" value="{{old('password1')}}" required autocomplete="on" >
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="showPassword1">
          <label class="form-check-label" for="showPassword1">
            Show Password
          </label>
        </div>
        @error('password1')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-primary" id="btn_UploadUsername"><span data-feather="save"></span> Save Change</button>
      </div>
  </form>
</div>