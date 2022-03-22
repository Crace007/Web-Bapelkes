<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Imagepost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view(
            'guest.home',
            [
                'title' => 'Halaman Home',
                'active' => 'home',
                'posts' => post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
                'imagepost' => Imagepost::all()
            ]
        );
    }

    public function show(post $post)
    {
        return View(
            'guest.show',
            [
                "title"      => "single post",
                'active'     => 'home',
                'post'       => $post,
                'posts'      => Post::latest()->limit(6)->get(),
                'imageposts' => Imagepost::all(),
                'postimg'    => Imagepost::where('post_id', $post->id)->get(),
            ]
        );
    }

    public function sejarah()
    {
        return view('guest.profile.sejarah', [
            'title' => 'Sejarah Bapelkes',
            'active' => 'profile'
        ]);
    }

    public function visiMisi()
    {
        return view('guest.profile.visimisi', [
            'title' => 'Sejarah Bapelkes',
            'active' => 'profile'
        ]);
    }

    public function tentangbapelkes()
    {
        return view('guest.profile.tentang', [
            'title' => 'Sejarah Bapelkes',
            'active' => 'profile'
        ]);
    }
}
