<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Post;
use App\Models\User;
use App\Models\Imagepost;

class AdministrasiController extends Controller
{
    public function index()
    {
        $berita = 1;
        $kegiatan = 2;
        $artikel = 3;
        $informasi = 4;

        return view('admin.dashboard.main', [
            'agenda' => Agenda::all(),
            'posts'   => Post::orderBy('id', 'DESC')->limit(5)->get(),
            'imagepost' => Imagepost::all(),
            'asn'   => User::where('status_pekerjaan', 'ASN')->get()->count(),
            'p3k'   => User::where('status_pekerjaan', 'P3K')->get()->count(),
            'berita' => Post::where('category_id', $berita)->get()->count(),
            'kegiatan' => Post::where('category_id', $kegiatan)->get()->count(),
            'artikel' => Post::where('category_id', $artikel)->get()->count(),
            'informasi' => Post::where('category_id', $informasi)->get()->count(),
        ]);
    }

    public function date()
    {
        return view('admin.dashboard.date');
    }

    public function blank()
    {
        return view('admin.blank');
    }
}
