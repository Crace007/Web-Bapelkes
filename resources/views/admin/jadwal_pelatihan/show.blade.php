@extends('admin.layouts.main')
@section('content')
<div class="container">
    <div class="pt-3 pb-2 mb-3 border-bottom">
      <a href="/admin/trainingschedule" class="btn btn-success"><span data-feather="arrow-left"></span> Back to data pelatihan</a>
      <a href="/admin/trainingschedule/{{$data->id}}/edit" class="btn btn-primary"><span data-feather="edit"></span> Edit</a>
      <form action="/admin/trainingschedule/{{$data->id}}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span> Delete</button>
      </form>
    </div>
    <div class="row my-3">
        <h4 class="text-center"> {{ $data->nama_pelatihan}} </h4>
        
        <div class="col-md">
            <h5>Informasi</h5>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead class="text-center table-dark">
                            <td>Jumlah Peserta</td>
                            <td>Tanggal Pelaksanaan</td>
                            <td>Lama_jpl</td>
                            <td>lama_hari</td>
                            <td>metode</td>
                            <td>Keterangan</td>
                        </thead>
                        <tr class="text-center">
                            <td>{{$data->jumlah_peserta}}</td>
                            <td>{{tanggal_id($data->tanggal_start)}} s/d {{tanggal_id($data->tanggal_end)}}</td>
                            <td>{{$data->lama_jpl}}</td>
                            <td>{{$data->lama_hari}}</td>
                            <td>{{$data->metode}}</td>
                            <td>{{$data->keterangan}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <h5>Penyelenggaraan</h5> 
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead class="text-center table-dark">
                            <td>Instansi Penyelenggara</td>
                            <td>Tempat Penyelengaraan</td>
                            <td>Sumber Dana</td>
                        </thead>
                        <tr class="text-center">
                            <td>{{$data->instansi_penyelenggara}}</td>
                            <td>{{$data->tempat_penyelenggaraan}}</td>
                            <td>{{$data->sumber_dana}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <h5>Pengurus</h5> 
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead class="text-center table-dark">
                            <td>Pengendali Pelatihan</td>
                            <td>Penanggung Jawab</td>
                            <td>Ketua Panitia</td>
                        </thead>
                        <tr class="text-center">
                            <td>
                                @foreach ($pegawai as $item)
                                    @if ($data->pengendaliPelatihan = $item->id)
                                        {{$item->user->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($pegawai as $item)
                                    @if ($data->penanggungJawab_id = $item->id)
                                        {{$item->user->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($pegawai as $item)
                                    @if ($data->ketuaPanitia_id = $item->id)
                                        {{$item->user->name}}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Persyaratan Peserta</h5>
            <div class="d-flex">
                <div class="ms-auto">
                  </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <div id="btn_tambahmateri">
                            <div class="text-center">
                                <button class="btn btn-primary btn-sm" onclick="createMateri({{$data->id}})" id="btn_tambahmateripelatihan">+ Tambah Materi</button>
                            </div>
                        </div>
                        <div id="formmateri"></div>
                    </div>
                        <table class="table table-hover table-sm" id="readtabelmaterifirst">
                            <thead class="text-center table-dark">
                                <td>Nama Materi</td>
                                <td>Pelatihan id</td>
                                <td>Update by</td>
                                <td>action</td>
                            </thead>
                            @foreach ($materi as $item)
                            <tr class="text-center">
                                <td>{{$item->nama}}</td>
                                <td>{{$item->pelatihan_id}}</td>
                                <td>{{$item->upload_by}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="updateMateri({{$item->id}})">edit</button>
                                    <form action="/admin/materipelatihans/{{$item->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    <div id="readtabelmateri"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection