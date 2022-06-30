@extends('guest.layouts.menu')
@section('content')
    <div class="row my-3">
        <div class="card">
            <div class="card-body">
              <h1 class="card-title text-center">MITRA KERJA</h1>
                <div class="card p-2">
                    <div class="row">
                        @foreach ($mitra as $item)
                            <div class="col-md-3 mb-3">
                                <div class="card" style="width: 16rem;">
                                    <img src="{{asset('storage/'.$item->logo)}}" height="200px" width="auto" style="object-fit: fill; object-position: 100% 0" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="card-text text-center">
                                            @if ($item->link_mitra)
                                                <a href="{{$item->link_mitra}}" class="text-decoration-none"><strong>{{$item->nama}}</strong></a>
                                            @else
                                                <strong>{{$item->nama}}</strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection