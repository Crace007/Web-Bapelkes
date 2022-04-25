@extends('admin.layouts.main')
@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom">
  <a href="/admin/posts/create" class="btn btn-primary">Create New Post</a>
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
<div class="col-md-10">
<div class="table-responsive">
    <table class="table table-hover table-sm">
      <thead class="table-dark">
        <tr class="text-center">
          <th scope="col">No.</th>
          <th scope="col">Title</th>
          <th scope="col">post</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($allposts as $post)        
          <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$post->title}}</td>
            <td class="text-center">{{$post->category->name}}</td>
            <td class="text-center">
                <a href="/admin/posts/{{$post->slug}}" class="badge bg-success"> <span data-feather="eye"></span> </a>
                <a href="/admin/posts/{{$post->slug}}/edit" class="badge bg-primary"> <span data-feather="edit"></span> </a>
                <form action="/admin/posts/{{$post->slug}}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span></button>
                </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
</div>
</div>

  @endsection