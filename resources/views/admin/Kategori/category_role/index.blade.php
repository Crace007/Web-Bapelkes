@extends('admin.layouts.main')
@section('content')
<div class="pt-3 pb-2 mb-3 border-bottom">
    <a href="/admin/rolecategories/create" class="btn btn-primary">Add Role</a>
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
            <th scope="col">Nama Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $category)        
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$category->nama}}</td>
              <td>
                  <a href="/admin/rolecategories/{{$category->id}}/edit" class="badge bg-primary"> <span data-feather="edit"></span> </a>
                  <form action="/admin/rolecategories/{{$category->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span></button>
                  </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
  </div>
  </div>
@endsection