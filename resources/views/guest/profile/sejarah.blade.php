@extends('guest.layouts.menu')
@section('content')
    <div class="row my-3">
        <div class="card">
            <div class="card-body">
              <h1 class="card-title text-center">SEJARAH BAPELKES MATARAM</h1>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        @if ($sejarah != null)
                            @foreach ($sejarah as $story)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <img src="{{ asset('storage/'.$story->image) }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <h5>{{ $story->title }}</h5>
                                            <p>{!! $story->description !!}</p>                                        
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p class="text-center fs-4">No Post Found</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection