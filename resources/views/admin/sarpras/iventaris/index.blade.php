@extends('admin.layouts.main')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <a href="/admin/iventaris/create" class="btn btn-primary">Tambah Iventaris</a>
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
        <div class="col-md  ">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="text-center table-dark">
                    <tr class="align-middle">
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nama Barang</th>
                        <th rowspan="2">Merk / Type</th>
                        <th colspan="2">Nomor</th>
                        <th rowspan="2">NUP</th>
                        <th rowspan="2">Tahun Pembelian</th>
                        <th rowspan="2">Jumlah Barang</th>
                        <th rowspan="2">Harga Pembelian</th>
                        <th colspan="3">Kondisi Barang</th>
                        <th rowspan="2">Ket.</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Kode Lokasi</th>
                        <th>B</th>
                        <th>RR</th>
                        <th>RB</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                          <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->type}}</td>
                            <td class="text-center">{{$item->kode_barang}}</td>
                            <td class="text-center">{{$item->kode_lokasi}}</td>
                            <td class="text-center">{{$item->nup}}</td>
                            <td class="text-center">{{$item->thn_pembelian}}</td>
                            <td class="text-center">{{$item->jumlah}}</td>
                            <td class="text-center">{{$item->harga}}</td>
                            <td class="text-center">
                                @if ($item->kondisi === 'b')
                                    √
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item->kondisi === 'rr')
                                    √
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item->kondisi === 'rb')
                                    √
                                @endif
                            </td>
                            <td>{{$item->keterangan}}</td>
                            <td class="text-center">
                                <a href="#" class="badge bg-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span data-feather="settings"></span></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a href="/admin/iventaris/{{$item->id}}" class="dropdown-item" type="button"><span data-feather="eye"></span> Detail</a>
                                  </li>
                                  <li>
                                    <a href="/admin/iventaris/{{$item->id}}/edit" class="dropdown-item" type="button"><span data-feather="edit"></span> Edit</a>
                                  </li>
                                  <li>
                                    <form action="/admin/iventaris/{{$item->id}}" method="POST" class="d-inline">
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
        </div>

@endsection