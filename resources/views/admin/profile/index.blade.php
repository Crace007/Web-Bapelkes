@extends('admin.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1">
  <h1 class="h2">PROFILE</h1>
  <span id="output" class="text-white" style="background-color: crimson"></span>
  {{-- <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search Postingan" aria-label="Search">
    <button class="btn btn-outline-dark" type="submit">Search</button>
  </form> --}}
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md"></div>
          <div class="col-md">
            @if (isset(auth()->user()->photo_profile))
              <img src="{{asset('storage/'.auth()->user()->photo_profile)}}" class="rounded-circle img-fuild mx-auto d-block" style="object-fit: cover; object-position: 100% 0" width="150" height="150">
            @else  
              <img src="{{ asset('storage/default_image/photo-profile.png') }}" class="rounded-circle img-fuild mx-auto d-block " width="150" height="150">
            @endif
          </div>
          <div class="col-md">
            <div class="d-flex flex-row-reverse">
              <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><span data-feather="menu"></span></button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><button type="button" class="dropdown-item btn btn-primary btn-sm mb-1 border-0" onclick="ResetModal()" data-bs-toggle="modal" data-bs-target="#fotoprofileModal"><span data-feather="image"></span> Change Photo Profile</button></li>
                <li><a href="/admin/users/setting" class="dropdown-item" type="button"><span data-feather="settings"></span> Settings</a></li>
              </ul>
            </div>
          </div>
          {{-- modal photo profile --}}
          <div class="modal fade" id="fotoprofileModal" tabindex="-1" aria-labelledby="fotoprofileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Change Photo Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- form --}}
                <form id="tesFormModal" method="POST" enctype="multipart/form-data" >
                  @csrf
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                  <input type="hidden" name="photoProfile_old" value="{{ auth()->user()->photo_profile }}">
                  <div class="modal-body">
                      <div class="text-center">
                        {{-- @if (isset(auth()->user()->photo_profile))
                          <img src="{{asset('storage/'.auth()->user()->photo_profile)}}"  id="imagePrev" class=" mt-2 img-preview rounded-circle img-fuild mx-auto d-block" style="object-fit: cover; object-position: 100% 0" width="150" height="150">
                          <a href="/admin/users/removeProfile/{{auth()->user()->id}}" id="btn_removePhotoProfile" class="btn btn-danger mt-3" onclick="return confirm('Are You Sure ?')">Remove Photo Profile <span data-feather="delete"></span></a>
                        @else  
                        @endif --}}
                        <img src="{{ asset('storage/default_image/photo-profile.png') }}" id="imagePrev" class="mt-2 img-preview rounded-circle img-fuild mx-auto d-block " width="150" height="150">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Upload Image:</label>
                          <input type="file" class="form-control @error('foto_pegawai') is-invalid @enderror" id="image" name="photo_profile" onchange="previewImage()">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="btn_cancelPhotoProfile" class="btn btn-secondary" data-bs-dismiss="modal">Close <span data-feather="x-circle"></span></button>
                    <button type="submit" id="btn_SavePhotoProfile" onclick="uploadProfile()" class="btn btn-primary">Save <span data-feather="save"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <h3 class="text-center mt-2">{{auth()->user()->name}}</h3>
        @if (isset(auth()->user()->about))
            <p class="text-center">"{{strip_tags(auth()->user()->about)}}"</p>
        @endif
      </div>
    </div>
    
    <div class="row mt-2">
      <div class="col-md-4">
        <div class="row mb-1">
          <div class="col-md">
            <h5>Data Diri</h5>
          </div>
          <div class="col-md">
            <div class="d-flex flex-row-reverse">
              <a href="/admin/users/{{auth()->user()->slug}}/edit" class="btn btn-primary btn-sm"><span data-feather="edit-2"></span> Edit</a>
            </div>
          </div>
        </div>
        <div class="col-md mb-2">
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
                  <td>{{auth()->user()->tempat_lahir}}, {{ tanggal_id(auth()->user()->tanggal_lahir) }}</td>
                  {{-- <td>{{auth()->user()->tempat_lahir}}, {{ auth()->user()->tanggal_lahir}}</td> --}}
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
                <tr>
                  <td>Status Hubungan</td>
                  <td>:</td>
                  <td>{{auth()->user()->status_hubungan}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="row mb-1">
          <div class="col-md">
            <h5>Kepegawaian</h5>
          </div>
          <div class="col-md">
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
        <div class="col-md mb-2">
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
          <div class="col-md mb-2">
            <div class="card">
              <div class="card-body">
                <table>
                  <tr>
                    <td>Bagian</td>
                    <td>:</td>
                    <td>Tenaga IT</td>
                  </tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td>S1 Informatika</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        @endif
        <div class="row">
          <div class="col-md">
            <h5>File</h5>
          </div>
          <div class="col-md">
            <div class="d-flex flex-row-reverse">
              <button type="button" class="btn btn-primary btn-sm mb-1 border-0" onclick="createFile()"><span data-feather="file-plus"></span> Add File</button>
            </div>
          </div>
        </div>
        {{-- File Upload Modal  --}}
        <div class="modal fade" id="FileProfileModal" tabindex="-1" aria-labelledby="testupdatefile" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="testupdatefile">Upload File</h5>
                </p>
                  <span id="reporterror" class="text-white" style="background-color: crimson"></span>
                <p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div id="page"></div>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card">
            <div class="card-body">
              <a class="btn-toggle-colaps d-flex ustify-content-between btn collapsed" data-bs-toggle="collapse" data-bs-target="#sertif-collapse" aria-expanded="false">
                SERTIFIKAT
              </a>
              <div class="collapse" id="sertif-collapse">
                <ul>
                  @if (!$filepersonal == null)
                    @foreach ($filepersonal as $item)
                      @if ($item->filecategory->name === 'Sertifikat')
                      <li>
                        <div class="btn btn-light btn-sm d-flex">
                          <div class="me-auto">
                            <a style="text-transform: uppercase" class="text-decoration-none" href="{{asset('storage/'. $item->nama_file)}}" target="_blank">
                            {{$item->nama}}
                            </a>
                          </div>
                          <div>   
                            <button class="btn btn-success btn-sm" onclick="updateFile({{ $item->id }})"><span data-feather="edit"></span></button>
                          </div>
                          <div>
                            <form action="admin/fileusers/{{$item->id}}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span></button>
                            </form>
                          </div>
                          <div>
                            <a class="btn btn-primary btn-sm" href="/admin/downloads/{{$item->id}}"><span data-feather="download"></span></a>
                          </div>
                        </div>
                      </li>
                      @endif
                    @endforeach
                  @endif
                  </ul>
              </div>
              <a class="btn-toggle-colaps d-flex ustify-content-between btn collapsed" data-bs-toggle="collapse" data-bs-target="#sk-collapse" aria-expanded="false">
                SK
              </a>
              <div class="collapse" id="sk-collapse">
                @if (!$filepersonal == null)
                <ul>
                    @foreach ($filepersonal as $item)
                      @if ($item->filecategory->name === 'SK')
                      <li>
                        <div class="btn btn-light btn-sm d-flex">
                          <div class="me-auto">
                            <a style="text-transform: uppercase" class="text-decoration-none" href="{{asset('storage/'. $item->nama_file)}}" target="_blank">
                            {{$item->nama}}
                            </a>
                          </div>
                          <div>   
                            <button class="btn btn-success btn-sm" onclick="updateFile({{ $item->id }})"><span data-feather="edit"></span></button>
                          </div>
                          <div>
                            <form action="/admin/fileusers/{{$item->id}}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span></button>
                            </form>
                          </div>
                          <div>
                            <a class="btn btn-primary btn-sm" href="/admin/downloads/{{$item->id}}"><span data-feather="download"></span></a>
                          </div>
                        </div>
                      </li>
                      @endif
                    @endforeach
                  </ul>
                @else
                  <p class="text-center">No data</p> 
                @endif
              </div>
              <a class="btn-toggle-colaps d-flex ustify-content-between btn collapsed" data-bs-toggle="collapse" data-bs-target="#dataLain-collapse" aria-expanded="false">
                DATA LAINNYA
              </a>
              <div class="collapse" id="dataLain-collapse">
                @if (!$filepersonal == null)
                <ul>
                    @foreach ($filepersonal as $item)
                      @if ($item->filecategory->name === 'Data Lainnya')
                      <li>
                        <div class="btn btn-light btn-sm d-flex">
                          <div class="me-auto">
                            <a style="text-transform: uppercase" class="text-decoration-none" href="{{asset('storage/'. $item->nama_file)}}" target="_blank">
                            {{$item->nama}}
                            </a>
                          </div>
                          <div>   
                            <button class="btn btn-success btn-sm" onclick="updateFile({{ $item->id }})"><span data-feather="edit"></span></button>
                          </div>
                          <div>
                            <form action="/admin/fileusers/{{$item->id}}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span></button>
                            </form>
                          </div>
                          <div>
                            <a class="btn btn-primary btn-sm" href="/admin/downloads/{{$item->id}}"><span data-feather="download"></span></a>
                          </div>
                        </div>
                      </li>
                      @endif
                    @endforeach
                  </ul>
                @else
                  <p class="text-center">No data</p> 
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row mb-1">
          <div class="col-md">
            <h5>Postingan</h5>
          </div>
          <div class="col-md">
            <div class="d-flex flex-row-reverse">
              <a href="/admin/posts/create" class="btn btn-primary btn-sm"><span data-feather="plus"></span> New Post</a>
            </div>
          </div>
        </div>
            @if (!$posts->isEmpty())
              @foreach ($posts as $post) 
                <div class="card mb-1">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-2">
                        @if (!$imagepost->isEmpty())
                            @foreach ($imagepost as $img)
                                @if ($img->post_id === $post->id)
                                    <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-10" src="{{asset('storage/'. $img->file_name)}}" alt="Los Angeles"></a>
                                    @break                                        
                                @endif
                                
                                @if ($loop->last)
                                    <a href="/show/{{$post->slug}}"><img class="rounde img-fluid w-10" src="https://source.unsplash.com/210x110?general" alt="Los Angeles"></a>
                                @endif

                            @endforeach
                          @else
                            <a href="/show/{{$post->slug}}"><img class="rounded img-fluid w-10" src="https://source.unsplash.com/500x500?news" alt="Los Angeles"></a>     
                          @endif
                      </div>
                      <div class="col-sm-9">
                        <a href="/admin/posts/{{$post->slug}}" style="text-transform: uppercase" class="text-decoration-none"><h6>{{$post->title}}</h6></a>
                        <p>{{$post->excerpt}}</p>
                      </div>
                      <div class="col-sm-1">
                        <div class="d-flex flex-row-reverse">
                            <a class="btn badge text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                              <span data-feather="more-vertical">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a href="/admin/posts/{{$post->slug}}/edit" class="dropdown-item" type="button"><span data-feather="edit"></span> edit</a></li>
                              <li>
                                <form action="/admin/posts/delete/{{$post->slug}}" method="POST" class="d-inline">
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
            <div class="mt-2 d-flex justify-content-center">
              {{ $posts->links() }}
          </div>
      </div>
    </div>
  </div>
</div>
@endsection