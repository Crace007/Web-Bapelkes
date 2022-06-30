@extends('admin.layouts.main')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <a href="/admin/sarana/create" class="btn btn-primary">Tambah Sarana</a>
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
        <div class="col-md-7">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="text-center table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jumlah Unit</th>
                        <th>Kapasitas / unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                        <tr class="text-center">
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->jumlah}}</td>
                          <td>{{$item->kapasitas}}</td>
                          <td>
                            <a href="/admin/sarana/{{$item->slug}}" class="badge bg-success"> <span data-feather="eye"></span> </a>
                            <a href="/admin/sarana/{{$item->slug}}/edit" class="badge bg-primary"> <span data-feather="edit"></span> </a>
                            <form action="/admin/sarana/{{$item->slug}}" method="POST" class="d-inline">
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