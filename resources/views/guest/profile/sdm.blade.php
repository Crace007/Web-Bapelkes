@extends('guest.layouts.menu')
@section('content')
    <div class="row my-3">
        <div class="card">
            <div class="card-body">
              <h1 class="card-title text-center">SDM</h1>
                <div class="card p-2">
                    <div class="row">
                        <h5 class="d-flex justify-content-center mt-1 text-muted">
                            Kepala Bapelkes
                        </h5>
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                            @foreach ($sdm_asn as $item)
                            @if ($item->jobcategory->nama_jabatan == 'Kepala Bapelkes')
                                <div class="col-md-3 mb-3 list-publish">
                                    <div class="card" style="width: 16rem;">
                                        <img src="{{asset('storage/'.$item->foto_pegawai)}}" style="height: 6cm; width: auto; object-fit: cover; object-position: 100% 0" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="card-text text-center"> <strong> {{$item->user->name}}</strong></div>
                                            <div class="card-text text-center"> {{$item->jobcategory->nama_jabatan}} </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <hr style="width: 100%">
                            </div>
                            <h5 class="d-flex justify-content-center text-muted">
                                Widyaiswara
                            </h5>
                            <div class="d-flex justify-content-center">
                                <hr style="width: 100%">
                            </div>
                                @foreach ($sdm_asn as $item)
                                @if ($item->jobcategory->nama_jabatan == 'Fungsional Widyaiswara')
                                    <div class="col-md-3 mb-3 list-publish">
                                        <div class="card" style="width: 16rem;">
                                            <img src="{{asset('storage/'.$item->foto_pegawai)}}" style="height: 6cm; width: auto; object-fit: cover; object-position: 100% 0" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="card-text text-center"> <strong> {{$item->user->name}}</strong></div>
                                                <div class="card-text text-center"> {{$item->jobcategory->nama_jabatan}} </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                        <h5 class="d-flex justify-content-center mt-1 text-muted">
                            Administrasi Umum
                        </h5>
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                            @foreach ($sdm_asn as $item)
                            @if (($item->jobcategory->nama_jabatan == 'Kepala Sub. Bagian Adum')||($item->jobcategory->nama_jabatan == 'Perencanaan/Penyusunan Program Anggaran dan Pelaporan')||($item->jobcategory->nama_jabatan == 'Bendahara')||($item->jobcategory->nama_jabatan == 'Pemeliharaan Sarana dan Prasarana')||($item->jobcategory->nama_jabatan == 'Pengadministrasi Umum')||($item->jobcategory->nama_jabatan == 'Peramu Bakti'))
                                <div class="col-md-3 mb-3 list-publish">
                                    <div class="card" style="width: 16rem;">
                                        <img src="{{asset('storage/'.$item->foto_pegawai)}}" style="height: 6cm; width: auto; object-fit: cover; object-position: 100% 0" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="card-text text-center"> <strong> {{$item->user->name}}</strong></div>
                                            <div class="card-text text-center"> {{$item->jobcategory->nama_jabatan}} </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                        <h5 class="d-flex justify-content-center text-muted">
                            Analis Data dan Informasi
                        </h5>
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                            @foreach ($sdm_asn as $item)
                            @if ($item->jobcategory->nama_jabatan == 'Analis Data dan Informasi')
                                <div class="col-md-3 mb-3 list-publish">
                                    <div class="card" style="width: 16rem;">
                                        <img src="{{asset('storage/'.$item->foto_pegawai)}}" style="height: 6cm; width: auto; object-fit: cover; object-position: 100% 0" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="card-text text-center"> <strong> {{$item->user->name}}</strong></div>
                                            <div class="card-text text-center"> {{$item->jobcategory->nama_jabatan}} </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                        <h5 class="d-flex justify-content-center text-muted">
                            Analist Diklat
                        </h5>
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                            @foreach ($sdm_asn as $item)
                            @if ($item->jobcategory->nama_jabatan == 'Analis Diklat')
                                <div class="col-md-3 mb-3 list-publish">
                                    <div class="card" style="width: 16rem;">
                                        <img src="{{asset('storage/'.$item->foto_pegawai)}}" style="height: 6cm; width: auto; object-fit: cover; object-position: 100% 0" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="card-text text-center"> <strong> {{$item->user->name}}</strong></div>
                                            <div class="card-text text-center"> {{$item->jobcategory->nama_jabatan}} </div>
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
@endsection