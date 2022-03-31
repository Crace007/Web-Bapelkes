@extends('admin.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
  <h1 class="h2">PROFILE</h1>
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search Postingan" aria-label="Search">
    <button class="btn btn-outline-dark" type="submit">Search</button>
  </form>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col"></div>
          <div class="col"><img src="{{ asset('storage/infopost_image/kepala-noimg.jpg') }}" class="rounded-circle img-fuild mx-auto d-block " alt="Cinque Terre" width="150" height="150"></div>
          <div class="col">
            <div class="d-flex flex-row-reverse">
              <a href="#" class="badge bg-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span data-feather="settings"></span></a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><button type="button" class="dropdown-item btn btn-primary btn-sm mb-1 border-0" data-bs-toggle="modal" data-bs-target="#fotoprofileModal"><span data-feather="image"></span> Change Photo Profile</button></li>
                <li><a href="#" class="dropdown-item" type="button"><span data-feather="lock"></span> Change Password</a></li>
              </ul>
            </div>
          </div>
          {{-- modal photo profile --}}
          <div class="modal fade" id="fotoprofileModal" tabindex="-1" aria-labelledby="fotoprofileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Photo Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Upload Image:</label>
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    <div class="text-center"><img src="{{ asset('storage/default_image/kepala-noimg.jpg') }}" class="rounded-circle img-fuild mx-auto d-block " alt="Cinque Terre" width="150" height="150"></div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h3 class="text-center">{{auth()->user()->name}}</h3>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <div class="row mb-1">
              <div class="col">
                <h5>Data Diri</h5>
              </div>
              <div class="col">
                <div class="d-flex flex-row-reverse">
                  <a href="/admin/users/{{auth()->user()->id}}/edit" class="btn btn-primary btn-sm"><span data-feather="edit-2"></span> Edit</a>
                </div>
              </div>
            </div>
            <div class="col mb-2">
              <div class="card">
                <div class="card-body">
                  <table>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td>{{auth()->user()->email}}</td>
                    </tr>
                    <tr>
                      <td>TTL</td>
                      <td>:</td>
                      {{-- <td>{{auth()->user()->birthplace}}, {!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime(auth()->user()->birthdate))) !!}</td> --}}
                      <td>{{auth()->user()->tempat_lahir}}, {{ date('d M Y', strtotime(auth()->user()->tanggal_lahir)) }}</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td>{{auth()->user()->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                      <td>Umur</td>
                      <td>:</td>
                      <td>{{auth()->user()->umur}}</td>
                    </tr>
                    <tr>
                      <td>Status Pekerjaan</td>
                      <td>:</td>
                      <td>{{auth()->user()->status_pekerjaan}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col">
                <h5>Data Kepegawaian</h5>
              </div>
              <div class="col">
                <div class="d-flex flex-row-reverse">
                  @if ( auth()->user()->employee_id === null)
                    <a href="/admin/employees/create" class="btn btn-primary btn-sm"><span data-feather="plus"></span> Lengkapi Data</a>  
                  @else
                    <a href="/admin/employees/{{auth()->user()->employee_id}}/edit" class="btn btn-primary btn-sm"><span data-feather="edit-2"></span> Edit</a>
                  @endif
                </div>
              </div>
            </div>
            @if ( auth()->user()->status_pekerjaan === 'ASN' )
            <div class="col mb-2">
              <div class="card">
                <div class="card-body">
                  @if ($pegawai === null)
                      <h5 class="d-flex justify-content-center">Data Pegawai Kosong Silahkah Lengkapi !!!</h5>
                  @else
                  <table>
                    <tr>
                      <td>NIP</td>
                      <td>:</td>
                      <td>{{$pegawai->nip}}</td>
                    </tr>
                    <tr>
                      <td>Pangkat</td>
                      <td>:</td>
                      <td>{{$pegawai->rankcategory->nama_pangkat}}, {{date('d M Y', strtotime($pegawai->tanggal_pangkat))}}</td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td>{{$pegawai->jobcategory->nama_jabatan}}</td>
                    </tr>
                    <tr>
                      <td>Masa Kerja</td>
                      <td>:</td>
                      <td>{{$pegawai->masaKerja_thn}} tahun, {{$pegawai->masaKerja_bln}} bulan</td>
                    </tr>
                    <tr>
                      <td>Latihan Jabatan</td>
                      <td>:</td>
                      <td>{{$pegawai->latihanJabatan_diklat}}, tahun {{$pegawai->latihanJabatan_tahun}}</td>
                    </tr>
                    <tr>
                      <td>Pendidikan Terakhir</td>
                      <td>:</td>
                      <td>{{$pegawai->pendidikan_terakhir}}</td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td>{{$pegawai->keterangan}}</td>
                    </tr>
                  </table>
                  @endif
                </div>
              </div>
            </div>
            @else
              <div class="col mb-2">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <td>Bagian</td>
                        <td>:</td>
                        <td>THL</td>
                      </tr>
                        <td>Pendidikan Terakhir</td>
                        <td>:</td>
                        <td>S2</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            @endif
            <div class="row">
              <div class="col">
                <h5>File Pribadi</h5>
              </div>
              <div class="col">
                <div class="d-flex flex-row-reverse">
                  <button type="button" class="btn btn-primary btn-sm mb-1 border-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><span data-feather="file-plus"></span> Tambahkan File</button>
                </div>
              </div>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                      </div>
                      <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  info 2
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-8">
            <div class="row mb-1">
              <div class="col">
                <h5>Postingan</h5>
              </div>
              <div class="col">
                <div class="d-flex flex-row-reverse">
                  <a href="/admin/posts/create" class="btn btn-primary btn-sm"><span data-feather="plus"></span> New Post</a>
                </div>
              </div>
            </div>
                @if ($posts != null)
                  @foreach ($posts as $post) 
                    <div class="card mb-1">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-1">
                            @if (!$imagepost->isEmpty())
                                @foreach ($imagepost as $img)
                                    @if ($img->post_id === $post->id)
                                        <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-10" src="{{asset('storage/'. $img->file_name)}}" alt="Los Angeles"></a>
                                        @break                                        
                                    @endif
                                    
                                    @if ($loop->last)
                                        <a href="/show/{{$post->slug}}"><img class="rounde img-fluid w-10" src="https://source.unsplash.com/50x50?general" alt="Los Angeles"></a>
                                    @endif

                                @endforeach
                              @else
                                <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-10" src="https://source.unsplash.com/500x500?news" alt="Los Angeles"></a>     
                              @endif
                          </div>
                          <div class="col-sm-10">
                            <a href="/admin/posts/{{$post->slug}}" class="text-dark"><h6>{{$post->title}}</h6></a>
                            <p>{{$post->excerpt}}</p>
                          </div>
                          <div class="col-sm-1">
                            <div class="d-flex flex-row-reverse">
                                <a class="btn badge text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                  ...
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a href="/admin/posts/{{$post->slug}}/edit" class="dropdown-item" type="button"><span data-feather="edit"></span> edit</a></li>
                                  <li>
                                    <form action="/admin/posts/{{$post->slug}}" method="POST" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="dropdown-item" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span> delete</button>
                                    </form>
                                  </li>
                                </ul>
                            </div>
                          </div>
                        </div>
                      </div>  
                    </div> 
                  @endforeach
                @else
                  <p class="text-center fs-4">No Post Found</p> 
                @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection