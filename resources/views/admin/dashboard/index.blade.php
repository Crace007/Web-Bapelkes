@extends('admin.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <h2 id="clock" style="font-family: fantasy"></h2>
</div>
 <div class="row">
   <div class="col">
    <h5>Jumlah Pegawai Bapelkes Mataram</h5>
    <div class="row">
      <div class="col">
        <div class="card text-center" style="background-color: aquamarine">
          <div class="card-title mt-2">
            <h4>ASN</h4>
          </div>
          <div class="card-body">
            <h3>23</h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="background-color: rgb(145, 227, 255)">
          <div class="card-title mt-2">
            <h4>P3K</h4>
          </div>
          <div class="card-body">
            <h3>??</h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="background-color: rgb(220, 251, 118)">
          <div class="card-title mt-2">
            <h4>Total Pegawai</h4>
          </div>
          <div class="card-body">
            <h3>??</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <h5>Jumlah Pelatihan</h5>
      <div class="col">
        <div class="card text-center" style="background-color: rgb(255, 195, 123)">
          <div class="card-title mt-2">
            <h4>Telah Terlaksana</h4>
          </div>
          <div class="card-body">
            <h3>??</h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="background-color: rgb(255, 138, 123)">
          <div class="card-title mt-2">
            <h5>Sedang Berlangsung</h5>
          </div>
          <div class="card-body">
            <h3>??</h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="background-color: rgb(200, 157, 253)">
          <div class="card-title mt-2">
            <h5>Belum Terlaksana</h5>
          </div>
          <div class="card-body">
            <h3>??</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <h5>Diagram Jumlah Peserta</h5>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <canvas id="densityChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <div class="col">
    <h4>All Posting</h4>
    <div class="card">test</div>
  </div>
 </div>

<script src="/js/chartjam.js"></script>
@endsection