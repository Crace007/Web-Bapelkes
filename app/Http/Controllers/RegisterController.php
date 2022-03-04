<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('guest.register.index', [
            'title' => 'Register',
            'active' => 'login',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => ['required', 'max:255'],
            'username'  => ['required', 'min:5', 'max:255', 'unique:users'],
            'email'     => ['required', 'email:dns', 'unique:users'],
            'password'  => ['required', 'min:6', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull please login');
        return redirect('/login')->with('success', 'Register success please login');
    }
}
