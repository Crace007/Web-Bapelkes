@extends('guest.layouts.menu')
@section('content')
    <div class="row my-3">
        <div class="card">
            <div class="card-body">
              <h1 class="card-title text-center">SDM</h1>
              <div class="card text-center">
                
              </div>
                <div class="card p-2">
                    <div class="row">
                        <h6 class="d-flex justify-content mb-1 text-muted mb-2">
                            <span>Administrasi</span>
                        </h6>
                        @foreach ($sdm_asn as $item)
                            <div class="col-md-3 mb-3">
                                <div class="card" style="width: 16rem;">
                                    <img src="{{asset('storage/'.$item->foto_pegawai)}}" style="height: 6cm; width: auto; object-fit: cover; object-position: 100% 0" class="card-img-top" alt="...">
                                    <div class="card-body image-card">
                                        <div class="card-text text-center"> <strong> {{$item->user->name}}</strong></div>
                                        <div class="card-text text-center"> {{$item->nip}} </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       
                        <div class="d-flex justify-content-center">
                            <hr style="width: 100%">
                        </div>
                        <h6 class="d-flex justify-content mb-1 text-muted mb-2">
                            <span>WI</span>
                        </h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection