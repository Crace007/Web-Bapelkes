@extends('admin.layouts.main')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <a href="/admin/sarana" class="btn btn-secondary"><span data-feather="arrow-left"></span> Back</a>
        <a href="/admin/sarana/{{$data->id}}/edit" class="btn btn-primary"><span data-feather="edit"></span> Edit</a>
        <a href="/admin/sarana/delete" class="btn btn-danger"><span data-feather="trash"></span> Delete</a>
    </div>
        <div class="col">
            <div class="card mb-3">
                <div class="card-title text-center"><h4>{{$data->nama}}</h4></div>
                <div class="card-body">
                    <table class="table table-bordered border-primary">
                        <tr>
                            <th>Jumlah Unit</th>
                            <td>{{$data->jumlah}}</td>
                        </tr>
                        <tr>
                            <th>Kapasitas / Unit</th>
                            <td>{{$data->kapasitas}}</td>
                        </tr>
                    </table>
                </div>
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
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-2 text-center">Fasilitas</h5>
                    <div id="btn_tambahfasilitas">
                        <div class="text-center">
                            <a class="btn btn-primary btn-sm mb-3 text-center" onclick="createFasilitas({{$data->id}})" ><span data-feather="plus"></span> Tambah Fasilitas</a>
                        </div>
                    </div>
                    <div id="formfasilitas" class="formfasilitas mb-2"></div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-sm" id="readtabelfasilitasfirst">
                                <thead class="text-center table-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Jumlah unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fasilitas as $item)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->fasilitas}}</td>
                                            <td class="text-center">{{$item->unit}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary" onclick="updateFasilitas({{$item->id}})">edit</button>
                                                <form action="/admin/fasilitas/{{$item->id}}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="readtabelfasilitas"></div>
                        </div>
                    </div>
                </div>        
                <div class="col-md-6">
                    <h5 class="mb-2 text-center">Foto Sarana</h5>
                    <div id="btn_tambahfotosarana">
                        <div class="text-center">
                            <a class="btn btn-primary btn-sm mb-3 text-center" onclick="createfotosarana({{$data->id}})" ><span data-feather="plus"></span> Tambah Foto Sarana</a>
                        </div>
                    </div>
                    <div id="formfotosarana" class="formfotosarana mb-2"></div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-sm" id="readtabelfotosaranafirst">
                                <thead class="text-center table-dark">
                                    <tr>
                                        <th>Foto Sarana</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fotosarana as $item)
                                        <tr class="text-center">
                                            <td><img src="{{asset('storage/' . $item->foto)}}" height="50px" width="auto" alt=""> </td>
                                            <td class="text-center">{{$item->nama}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary" onclick="updatefotosarana({{$item->id}})">edit</button>
                                                <form action="/admin/fotosarana/{{$item->id}}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="readtabelfotosarana"></div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>


<script src="/js/fasilitas.js"></script>
<script src="/js/fotosarana.js"></script>
@endsection