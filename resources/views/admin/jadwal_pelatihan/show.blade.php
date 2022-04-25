@extends('admin.layouts.main')
@section('content')

<div class="container">
    <div class="pt-3 pb-2 mb-3 border-bottom">
      <a href="/admin/employees" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Post Page</a>
      <a href="/admin/employees/{{$data->id}}/edit" class="btn btn-primary"><span data-feather="edit"></span> Edit</a>
      <form action="/admin/employees/{{$data->id}}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span> Delete</button>
      </form>
    </div>
    <div class="row my-3">
        <h1 class="text-center"> Data Lengkap Kepegawaian</h1>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-2">
                                <div class="col"></div>
                                <div class="col text-center">
                                    @if ($data->foto_pegawai != null)
                                        <img src="{{asset('storage/'.$data->foto_pegawai)}}" height="75%" width="auto" alt="">
                                    @else
                                        <img src="{{ asset('storage/infopost_image/kepala-noimg.jpg') }}" class="rounded img-fuild mx-auto d-block " alt="Cinque Terre" width="300" height="400">
                                    @endif
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <th>Nip</th>
                                </tr>
                                <tr>
                                    <td>{{$data->nip}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Nama</th>
                                </tr>
                                <tr>
                                    <td>{{$data->user->name}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                </tr>
                                <tr>
                                    <td>{{$data->user->tempat_lahir}}, {{date('d M Y', strtotime($data->user->tanggal_lahir))}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Pangkat</th>
                                </tr>
                                <tr>
                                    <td>
                                        {{$data->rankcategory->nama_pangkat}} , Tanggal {{date('d M Y', strtotime($data->tanggal_pangkat))}}
                                    </td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Jabatan</th>
                                </tr>
                                <tr>
                                    <td>{{$data->jobcategory->nama_jabatan}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Masa Kerja</th>
                                </tr>
                                <tr>
                                    <td>{{$data->masaKerja_thn}} tahun, {{$data->masaKerja_bln}} bulan</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Latihan Jabatan</th>
                                </tr>
                                <tr>
                                    @if (($data->latihanJabatan_diklat === null) && ($data->latihanJabatan_tahun == null))
                                        <td>---</td>
                                    @else
                                        <td>{{$data->latihanJabatan_diklat}}, tahun {{$data->latihanJabatan_tahun}}</td>
                                    @endif
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                </tr>
                                <tr>
                                    <td>{{$data->pendidikan_terakhir}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Usia</th>
                                </tr>
                                <tr>
                                    <td>{{$data->user->umur}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Jenis Kelamin</th>
                                </tr>
                                <tr>
                                    <td>{{$data->user->jenis_kelamin}}</td>
                                </tr>
                                {{-- pembatas --}}
                                <tr>
                                    <th>Keterangan</th>
                                </tr>
                                <tr>
                                    @if ($data->keterangan === null)
                                        <td>---</td>
                                    @else
                                        <td>{{$data->keterangan}}</td>
                                    @endif
                                </tr>
        
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5>File Pribadi</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection