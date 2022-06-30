@extends('guest.layouts.menu')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-2">DATA PELATIHAN</h4>
            <div class="text-end">
                <div class="dropdown mb-2">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Tahun
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">2022</a></li>
                      <li><a class="dropdown-item" href="#">2021</a></li>
                      <li><a class="dropdown-item" href="#">2020</a></li>
                      <li><a class="dropdown-item" href="#">2019</a></li>
                      <li><a class="dropdown-item" href="#">2018</a></li>
                    </ul>
                </div>
            </div>
            <table class="table table-hover table-md">
                <thead class="table-dark text-center">
                    <td>No.</td>
                    <td>Nama Pelatihan</td>
                    <td>Tanggal Pelaksanaan</td>
                    <td>Durasi</td>
                    <td>Metode Pelatihan</td>
                    <td>Tempat Penyelenggaraan</td>
                    <td>action</td>
                </thead>
                @foreach ($data as $item)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td class="text-start">{{$item->nama_pelatihan}}</td>
                        <td>{{tanggal_id($item->tanggal_start)}} ~ {{tanggal_id($item->tanggal_end)}}</td>
                        <td>{{$item->lama_jpl}} jpl / {{$item->lama_hari}} hari</td>
                        <td>{{$item->metode}}</td>
                        <td>{{$item->tempat_penyelenggaraan}}</td>
                        <td><a href="/register/peserta" class="badge text-light bg-success">register</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection