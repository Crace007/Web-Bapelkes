@extends('admin.layouts.main')
@section('content')

<div class="container">
    <div class="pt-3 pb-2 mb-3 border-bottom">
      <a href="/admin/otherinfos" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Post Page</a>
      <a href="/admin/otherinfos/{{$info->id}}/edit" class="btn btn-primary"><span data-feather="edit"></span> Edit</a>
      <form action="/admin/otherinfos/{{$info->id}}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><span data-feather="trash"></span> Delete</button>
      </form>
    </div>
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <img class="rounded" height="400" src="{{asset('storage/'.$info->image)}}" alt="">
                <h1 class="mt-3">{{$info->title}}</h1>
                <p>Kategory : <a href="/admin/otherinfos?category={{$info->infocategory->id}}" class="text-decoration-none">{{$info->infocategory->name}}</a></p>
                <p class="mt-3">{!! $info->description !!} </p>
            </article>
        </div>
    </div>
</div>

@endsection