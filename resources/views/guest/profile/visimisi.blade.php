@extends('guest.layouts.menu')
@section('content')
<div class="row my-3">
    <div class="card">
        <div class="card-body">
          <h1 class="card-title text-center">VISI MISI</h1>
            <div class="card p-2">
               <div class="row">
                   <div class="col-md-3">
                        <div class="card bg-warning d-flex justify-content-center" style="height: 150px">
                            <h3 class="text-center">VISI</h3>
                        </div>
                   </div>
                   <div class="col-md-7 p-2">
                        <ul>
                            <li style="font-family: 'Times New Roman', Times, serif;">
                                <strong>
                                    Terwujudnya Indonesia Maju yang Berdaulat, Mandiri, dan Berkepribadian, Berlandaskan Gotong Royong
                                </strong>
                            </li>
                        </ul>
                       
                        {{-- @if ($visi != null)
                            <p> {!! $visi->description !!} </p>
                        @else
                            <p>Data Not Found</p>
                        @endif --}}
                   </div>
               </div>
            </div>
            <div class="card p-2">
               <div class="row">
                   <div class="col-md-3">
                        <div class="card bg-success d-flex justify-content-center" style="height: 150px">
                            <h3 class="text-center">MISI</h3>
                        </div>
                   </div>
                   <div class="col-md-7 p-2">
                    <ol style="font-family: 'Times New Roman', Times, serif;">
                        <strong>
                           <li>
                                Memperkuat upaya kesehatan yang bermutu dan menjangkau seluruh penduduk  Indonesia
                           </li>
                           <li>
                                Memberdayakan masyarakat dan pembangunan berwawasan kesehatan
                           </li>
                           <li>
                                Meningkatkan ketersediaan pemerataan dan mutu sumberdaya kesehatan
                           </li>
                           <li>
                                Memantapkan tata kelola pemerintahan yang baik, bersih dan inovatif
                           </li>
                        </strong>
                    </ol>
                        {{-- @if ($visi != null)
                            <p> {!! $visi->description !!} </p>
                        @else
                            <p>Data Not Found</p>
                        @endif --}}
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>

    {{-- <div class="row">
        <div class="card">
            <div class="card-header text-center">
                <h3>VISI & MISI</h3>
            </div>
            <div class="col-md-8 offset-2"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 offset-1">
                            <div class="card bg-warning d-flex justify-content-center" style="height: 150px">
                                <h3 class="text-center">VISI</h3>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-7">
                            @if ($visi != null)
                                <p> {!! $visi->description !!} </p>
                            @else
                                <p>Data Not Found</p>
                            @endif
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 offset-1">
                            <div class="card bg-success d-flex justify-content-center" style="height: 200px">
                                <h3 class="text-center text-light">MISI</h3>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($misi != null)
                            <p>{!! $misi->description !!}</p>
                            @else
                                <p>Data Not Found</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection