@extends('guest.layouts.menu')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-register">
            <h1 class="h3 mt-3 mb-3 fw-normal text-center">Registration Form</h1>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Registrations success</strong>,
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating mb-2">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name" value="{{old('name')}}" autofocus required>
                    <label for="floatingInput">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" value="{{old('username')}}" required>
                    <label for="floatingInput">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" required>
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3 mb-2">Already Have An Account ? <a href="/login">Login</a></small>
        </main>
    </div>
</div>

@endsection