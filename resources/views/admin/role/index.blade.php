@extends('admin.layouts.main')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Role User Management</h2>
    </div>
  
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
  <div class="col-sm-6">
  <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama User</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)        
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->role->nama}}</td>
              <td>
                  <a href="/admin/rules/{{$item->slug}}/edit" class="badge bg-primary"> <span data-feather="edit"></span> </a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
  </div>
  </div>
@endsection