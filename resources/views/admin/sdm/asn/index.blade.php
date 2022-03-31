@extends('admin.layouts.main')
@section('content')
<div class="pt-3 pb-2 mb-3 border-bottom">
    <a href="/admin/employees/create" class="btn btn-primary">Tambah Data Pegawai</a>
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
  <div class="table-responsive-sm">
      <table class="table table-hover table-sm">
        <thead class="text-center table-dark">
          <tr class="align-middle">
            <th scope="col" rowspan="2">#</th>
            <th scope="col" rowspan="2">NAMA</th>
            <th scope="col">TEMPAT</th>
            <th scope="col">PANGKAT</th>
            <th scope="col" rowspan="2">JABATAN</th>
            <th scope="col" colspan="2">MASA KERJA</th>
            <th scope="col" colspan="2">LATIHAN JABATAN</th>
            <th scope="col" rowspan="2">PENDIDIKAN</th>
            <th scope="col" rowspan="2">USIA</th>
            <th scope="col">JENIS</th>
            <th scope="col" rowspan="2">KET</th>
            <th scope="col" rowspan="2">ACTION</th>
          </tr>
          <tr>
            <th scope="col">TANGGAL LAHIR</th>
            <th scope="col">GOLONGAN</th>
            <th scope="col">THN</th>
            <th scope="col">BLN</th>
            <th scope="col">DIKLAT</th>
            <th scope="col">BLN</th>
            <th scope="col">KELAMIN</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataPegawai as $data)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>
                {{$data->user->name}} 
                <p>
                  {{$data->nip}}
                </p>
              </td>
              <td class="text-center">
                {{$data->user->tempat_lahir}} 
                <p>
                  {{date('d M Y', strtotime($data->user->tanggal_lahir))}}
                </p>
              </td>
              <td class="text-center">
                {{$data->rankcategory->nama_pangkat}}
                <p>
                  {{date('d M Y', strtotime($data->tanggal_pangkat))}}
                </p>
              </td>
              <td class="text-center">{{$data->jobcategory->nama_jabatan}}</td>
              <td class="text-center">{{$data->masaKerja_thn}}</td>
              <td class="text-center">{{$data->masaKerja_bln}}</td>
              <td class="text-center">{{$data->latihanJabatan_diklat}}</td>
              <td class="text-center">{{$data->latihanJabatan_tahun}}</td>
              <td class="text-center">{{$data->pendidikan_terakhir}}</td>
              <td class="text-center">{{$data->user->umur}}</td>
              <td class="text-center">{{$data->user->jenis_kelamin}}</td>
              <td class="text-center">{{$data->keterangan}}</td>
              <td class="text-center">
                <a href="#" class="badge bg-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span data-feather="settings"></span></a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a href="/admin/employees/{{$data->id}}" class="dropdown-item" type="button"><span data-feather="eye"></span> Detail</a>
                  </li>
                  <li>
                    <a href="/admin/employees/{{$data->id}}/edit" class="dropdown-item" type="button"><span data-feather="edit"></span> Edit</a>
                  </li>
                  <li>
                    <form action="/admin/employees/{{$data->id}}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="dropdown-item" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span> Delete</button>
                    </form>
                    {{-- <a href="/admin/employees/{{$data->id}}/edit" class="dropdown-item" type="button"><span data-feather="trash"></span> Delete</a> --}}
                  </li>
                </ul>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection