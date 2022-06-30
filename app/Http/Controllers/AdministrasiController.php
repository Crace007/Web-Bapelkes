<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function blank()
    {
        return view('admin.blank');
    }
}
