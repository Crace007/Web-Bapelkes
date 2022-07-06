<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Imagepost;
use App\Models\Postcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Faker\Provider\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->where('user_id', auth()->user()->id)->get(),
            'allposts'   => Post::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Postcategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:255',
            'slug'          => 'required|unique:posts,slug',
            'dateactivity'  => 'required',
            'category_id'   => 'required',
            'file_name'     => 'required|max:10240',
            'file_name.*'   => 'mimes:jpg,jpeg,png,bmp',
            'body'          => 'required'
        ]);

        $data = [
            'title'         => $request->title,
            'slug'          => $request->slug,
            'dateactivity'  => $request->dateactivity,
            'category_id'   => $request->category_id,
            'body'          => $request->body,
            'user_id'       => auth()->user()->id,
            'excerpt'       => Str::limit(strip_tags($request->body), 150, '...'),
        ];

        if ($request->file('file_name')) {
            $postId = Post::create($data)->id;
            foreach ($request->file('file_name') as $key) {
                # code...
                $image['file_name'] = $key->store('post_image');
                $image['post_id'] =  $postId;
                Imagepost::create($image);
            }
        };

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post,
            'postimg' => Imagepost::where('post_id', $post->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view('admin.posts.edit', [
            'categories' => Postcategory::all(),
            'postimg' => Imagepost::where('post_id', $post->id)->get(),
            'post'  => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $rules = [
            'title'         => 'required|max:255',
            'dateactivity'  => 'required',
            'category_id'   => 'required',
            'file_name'     => 'max:10240',
            'file_name.*'   => 'mimes:jpg,jpeg,png,bmp',
            'body'          => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts,slug';
        }

        $request->validate($rules);

        $data =  [
            'title'         => $request->title,
            'dateactivity'  => $request->dateactivity,
            'category_id'   => $request->category_id,
            'body'          => $request->body,
            'slug'          => $request->slug,
            'user_id'       => auth()->user()->id,
            'excerpt'       => Str::limit(strip_tags($request->body), 150, '...')
        ];


        if ($request->file('file_name')) {
            foreach ($request->file('file_name') as $key) {
                # code...
                $image['file_name'] = $key->store('post_image');
                $image['post_id'] =  $post->id;
                Imagepost::create($image);
            }
        };

        Post::where('id', $post->id)
            ->update($data);

        return redirect('/admin/posts/' . $request->slug . '/edit')->with('success', 'The Selected Post Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $tagetimg = Imagepost::all();
        foreach ($tagetimg as $img) {
            if ($img->user_id === $post->id) {
                Storage::delete($img->file_name);
                Imagepost::destroy($img->id);
            }
        }
        Post::destroy($post->id);
        return redirect('/admin/posts')->with('destroy', 'The Selected Post Has Been Deleted!');
    }

    public function deletepost(Post $post)
    {
        $tagetimg = Imagepost::all();
        foreach ($tagetimg as $img) {
            if ($img->user_id === $post->id) {
                Storage::delete($img->file_name);
                Imagepost::destroy($img->id);
            }
        }
        Post::destroy($post->id);
        return redirect('/admin/users')->with('destroy', 'The Selected Post Has Been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public  function removeimg(Imagepost $images)
    {
        Storage::delete($images->file_name);
        Imagepost::destroy($images->id);
        return redirect()->back()->with('destroy', 'The Selected Image Has Been Removed!')->withInput();
    }
}
