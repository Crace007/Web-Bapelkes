@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mb-2">Buat Agenda baru</h1>
    <a href="/admin/agenda" class="link-secondary"><span data-feather="arrow-left"></span> Kembali ke List Agenda</a>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/agenda" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label"><Strong>Title</Strong></label>
          <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('title')}}" required autofocus >
          @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label"><strong>Slug</strong></label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" required  readonly>
          @error('slug')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col">
              <label for="tanggal_mulai" class="form-label"> <strong>Tanggal Waktu Mulai</strong></label>
              <input type="datetime-local" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{old('tanggal_mulai')}}" required >
              @error('tanggal_mulai')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="tanggal_selesai" class="form-label"> <strong>Tanggal Waktu Berakhir</strong></label>
              <input type="datetime-local" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{old('tanggal_selesai')}}" required >
              @error('tanggal_selesai')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="Category" class="form-label"><strong>Penanggung Jawab</strong></label>
          <select class="form-select" name="user_id">
            <option value="{{null}}" disabled selected>-- SELECT ONE --</option>
              @foreach ($user as $item)
              @if ($item->status_pekerjaan == 'ASN')
                @if (old('user_id') == $item->id)
                  <option value="{{$item->id}}" selected> {{$item->name}} </option>
                @else
                  <option value="{{$item->id}}"> {{$item->name}} </option>
                @endif
              @endif
              @endforeach
          </select>
          @error('user_id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label"> <strong>Body</strong> </label>
            <div class="card p-2">
              <input type="hidden" name="body" id="body" value="{{ old('body') }}">
              <trix-editor input="body"></trix-editor>
            </div>
            @error('body')
                <p class="text-danger">The body field is required</p>
            @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary mb-3">Tambah Agenda <span data-feather="Plus"></span></button>
        </div>
      </form>
</div>

@endsection