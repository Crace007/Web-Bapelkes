<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
                "posts" => post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            ]
        );
    }

    public function show(post $post)
    {
        return View('posts', [
            "title" => "single post",
            'active' => 'blog',
            "post" => $post
        ]);
    }
}
