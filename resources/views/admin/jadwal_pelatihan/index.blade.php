@extends('admin.layouts.main')
@section('content')
<div class="pt-3 pb-2 mb-3 border-bottom">
    <a href="/admin/trainingschedule/create" class="btn btn-primary">Create Jadwal Baru</a>
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
  <div class="col-md-11">
  <div class="table-responsive">
      <table class="table table-hover table-sm">
        <thead class="text-center table-dark">
          <tr>
            <th scope="col" rowspan="2">No.</th>
            <th scope="col" rowspan="2">Nama Pelatihan</th>
            <th scope="col" rowspan="2">Jumlah Peserta</th>
            <th scope="col" colspan="2">Tanggal Pelaksana</th>
            <th scope="col" colspan="2">Lama</th>
            <th scope="col" rowspan="2">Metode</th>
            <th scope="col" rowspan="2">Tempat Penyelenggara</th>
            <th scope="col" rowspan="2">ket</th>
          </tr>
          <tr>
              <th>mulai</th>
              <th>berakhir</th>
              <th>jpl</th>
              <th>hari</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $jadwal)        
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$jadwal->nama_pelatihan}}</td>
              <td class="text-center">{{$jadwal->jumlah_peserta}}</td>
              <td class="text-center">{{date('d M Y', strtotime($jadwal->tanggal_start))}}</td>
              <td class="text-center">{{date('d M Y', strtotime($jadwal->tanggal_end))}}</td>
              <td class="text-center">{{$jadwal->lama_jpl}}</td>
              <td class="text-center">{{$jadwal->lama_hari}}</td>
              <td class="text-center">{{$jadwal->metode}}</td>
              <td class="text-center">{{$jadwal->tempat_penyelenggaraan}}</td>
              <td class="text-center">
                  <a href="/admin/trainingschedule/{{$jadwal->id}}" class="badge bg-success"> <span data-feather="eye"></span> </a>
                  <a href="/admin/trainingschedule/{{$jadwal->id}}/edit" class="badge bg-primary"> <span data-feather="edit"></span> </a>
                  <form action="/admin/trainingschedule/{{$jadwal->id}}" method="POST" class="d-inline">
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