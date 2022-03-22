<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Imagepost;
use App\Models\Category;
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
            'allposts'   => Post::all()
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
            'categories' => Category::all()
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
            'category_id'   => 'required',
            'file_name'     => 'required|max:10240',
            'file_name.*'   => 'mimes:jpg,jpeg,png,bmp',
            'body'          => 'required'
        ]);

        // dd($request);

        $validate = [
            'title'         => $request->title,
            'slug'          => $request->slug,
            'category_id'   => $request->category_id,
            'body'          => $request->body,
            'user_id'       => auth()->user()->id,
            'excerpt'       => Str::limit(strip_tags($request->body), 150, '...')
        ];

        if ($request->file('file_name')) {
            $postId = Post::create($validate)->id;
            foreach ($request->file('file_name') as $key) {
                # code...
                $image['file_name'] = $key->store('post_image');
                $image['post_id'] =  $postId;
                Imagepost::create($image);
            }
        };

        return redirect('/admin/posts')->with('success', 'New Post Has Been Added!');
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
        return view('admin.posts.edit', [
            'categories' => Category::all(),
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
            'category_id'   => 'required',
            'file_name'     => 'max:10240',
            'file_name.*'   => 'mimes:jpg,jpeg,png,bmp',
            'body'          => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $request->validate($rules);

        $validate =  [
            'title'         => $request->title,
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
            ->update($validate);

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
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/admin/posts')->with('destroy', 'The Selected Post Has Been Deleted!');
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
