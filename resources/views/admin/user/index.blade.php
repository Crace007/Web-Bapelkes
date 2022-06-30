@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
  <a href="/admin/info/users/create" class="btn btn-primary">Create New User</a>
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
<div class="col-md-10">
<div class="table-responsive">
    <table class="table table-hover table-sm">
      <thead class="table-dark">
        <tr class="align-middle text-center">
          <th scope="col" rowspan="2">No.</th>
          <th scope="col" rowspan="2">Nama</th>
          <th scope="col" rowspan="2">Username</th>
          <th scope="col" rowspan="2">Email</th>
          <th scope="col">Tempat</th>
          <th scope="col"  rowspan="2">Jenis Kelamin</th>
          <th scope="col"  rowspan="2">Umur</th>
          <th scope="col" colspan="2">Status</th>
          <th scope="col"  rowspan="2">Action</th>
        </tr>
        <tr class="text-center">
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Hubungan</th>
            <th scope="col">Pekerjaan</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($data as $item)        
          <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td>
            <td class="text-center">{{$item->email}}</td>
            <td class="text-center">
                {{$item->tempat_lahir}}
                <p>
                    {{ tanggal_id($item->tanggal_lahir)}}
                </p>
            </td>
            <td class="text-center">{{$item->jenis_kelamin}}</td>
            <td class="text-center">{{$item->umur}}</td>
            <td class="text-center">{{$item->status_hubungan}}</td>
            <td class="text-center">{{$item->status_pekerjaan}}</td>
            <td class="text-center">
                <a href="/admin/info/users/{{$item->slug}}" class="badge bg-success"> <span data-feather="eye"></span> </a>
                <a href="/admin/info/users/{{$item->slug}}/edit" class="badge bg-primary"> <span data-feather="edit"></span> </a>
                <form action="/admin/info/users/{{$item->slug}}" method="POST" class="d-inline">
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