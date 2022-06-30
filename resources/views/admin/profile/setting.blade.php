@extends('admin.layouts.main')
@section('content')
    <div class="col-md">
        <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mb-2">Setting User Profile</h1>
            <a href="/admin/users" class="link-secondary"><span data-feather="arrow-left"></span> Back to Profile Page</a>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center">
                        <h3>Menu</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <button  class="list-group-item list-group-item-action list-group-item-success mb-2" onclick="changeUsername()"><h5>Change Username <span data-feather="pen-tool"></h5></a>
                            <button  class="list-group-item list-group-item-action list-group-item-info mb-2" onclick="changeEmail()"><h5>Change Email <span data-feather="mail"></span></h5></button>
                            <button  class="list-group-item list-group-item-action list-group-item-warning mb-2" onclick="changePassword()"><h5>Change Password <span data-feather="key"></span></h5></button>
                            {{-- <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Format Posting</a> --}}
                            {{-- <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Primary item</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('destroy'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('destroy')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">  
                    <div id="changeUsername" style="display: none">
                        @include('admin.profile.settingMenu.username')
                    </div>
                    <div id="changeEmail" style="display: none">
                        @include('admin.profile.settingMenu.email')
                    </div>
                    <div id="changePassword" style="display: none">
                        @include('admin.profile.settingMenu.password')
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="/js/passwordsetting.js"></script>
@endsection