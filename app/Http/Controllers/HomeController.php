<?php

namespace App\Http\Controllers;

use App\Models\Otherinfo;
use App\Models\Infocategory;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Imagepost;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Info;

class HomeController extends Controller
{

    public function index()
    {
        $title = '';

        $kepala = Otherinfo::getInfo('chairman');

        if ($kepala != null) {
            $kepala = Otherinfo::getInfo('chairman')->first();
        }

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
                'baner' => Otherinfo::getInfo('baner-carousel'),
                'kepala' => $kepala,
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
            'active' => 'profile',
            'sejarah' => Otherinfo::getInfo('story')
        ]);
    }

    public function visiMisi()
    {
        $visi = Otherinfo::getInfo('visi');

        if ($visi != null) {
            $visi = Otherinfo::getInfo('visi')->first();
        }

        $misi = Otherinfo::getInfo('misi');

        if ($misi != null) {
            $misi = Otherinfo::getInfo('misi')->first();
        }

        return view('guest.profile.visimisi', [
            'title' => 'Sejarah Bapelkes',
            'active' => 'profile',
            'visi'  => $visi,
            'misi'  => $misi
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
