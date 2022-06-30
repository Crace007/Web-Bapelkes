@extends('guest.layouts.menu')
@section('content')
    <div class="row my-3">
        <div class="card">
            <div class="card-body">
              <h1 class="card-title text-center">SARANA PELAYANAN</h1>
              @foreach ($sarana as $saranaitem)
                <div class="card mb-2">
                    <div class="card-title text-center"><h4>{{$saranaitem->nama}}</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="mb-2">
                                    <tr>
                                        <th>Jumlah Unit</th>
                                        <td> : </td>
                                        <td>{{$saranaitem->jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kapasitas / Unit</th>
                                        <td> : </td>
                                        <td>{{$saranaitem->kapasitas}}</td>
                                    </tr>
                                </table>
                                <div class="text-center"><strong>Fasilitas Sarana</strong></div>
                                <table class="table table-hover table-sm">
                                    <thead class="text-center table-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Jumlah unit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fasilitas as $fasilitasitem)
                                            @if ($fasilitasitem->sarana_id == $saranaitem->id)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$fasilitasitem->fasilitas}}</td>
                                                    <td class="text-center">{{$fasilitasitem->unit}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <div class="text-center mb-2"><strong>Foto Sarana</strong></div>
                                <div class="row">
                                    @foreach ($foto as $fotoitem)
                                        @if ($fotoitem->sarana_id == $saranaitem->id)
                                            <div class="col-md-6">
                                                <div class="card mb-1">
                                                    <div class="card-body text-center">
                                                        <img src="{{asset('storage/'.$fotoitem->foto)}}" height="140px" width="auto" alt="">
                                                        <p>{{$fotoitem->nama}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
@endsection