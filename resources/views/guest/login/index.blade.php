@extends('guest.layouts.menu')
@section('content')

  <div class="row justify-content-center">
      <div class="col-md-5"> 
            <main class="form-signin mb-5">
              <h1 class="h3 mt-3 mb-5 fw-normal text-center">Please Log in</h1>
                @if (session()->has('success'))    
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                  <strong>Registrations success</strong>, {{session('success')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
    
                @if (session()->has('loginError'))    
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                  <strong>Failed Login</strong>, {{session('loginError')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-2">
                  <input type="text" name="username" class="form-control @error('username')
                      is-invalid
                  @enderror" id="username" placeholder="username" autofocus required value="{{old('username')}}">
                  <label for="floatingInput">Username</label>
                  @error('usernmae')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="form-floating mb-5">
                  <input type="password" name="password" class="form-control mb-2" id="password" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="showPassword">
                    <label class="form-check-label" for="showPassword">
                      Show Password
                    </label>
                  </div>
                </div>
                
                {{-- <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div> --}}
                <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
                {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
              </form>
            </main>
            {{-- <small class="d-block text-center mt-3 mb-5">Don't Have Account ? <a href="/register">Register Now</a></small> --}}
      </div>
  </div>
  <script src="/js/showpassword.js"></script>
@endsection