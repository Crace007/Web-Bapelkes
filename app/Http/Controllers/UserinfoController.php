<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Fileuser;
use App\Models\Imagepost;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Filecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'data' => User::all(),
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
            'data' => Role::where('nama', 'Member')->get()->first(),
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
        $data = $request->validate([
            'role_id'           => 'required',
            'name'              => 'required|max:60',
            'username'          => 'required|max:25|unique:users',
            'slug'              => 'required|unique:users',
            'email'             => 'required|email:dns|unique:users',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'umur'              => 'required',
            'status_pekerjaan'  => 'required',
            'status_hubungan'   => 'required',
            'password'          => 'required|min:6|max:255',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect('/admin/info/users')->with('success', 'Register User Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', [
            'imagepost' => Imagepost::all(),
            'posts'     => Post::latest()->where('user_id', $user->id)->get(),
            'pegawai'   => Employee::where('id', $user->employee_id)->get()->first(),
            'personal'  => User::where('id', $user->id)->get(),
            'data'      => $user,
            'fileuser'  => Fileuser::all(),
            'filepersonal'  => Fileuser::where('user_id', $user->id)->get(),
            'categories' => Filecategory::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name'              => 'required|max:60',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'umur'              => 'required',
            'status_pekerjaan'  => 'required',
            'status_hubungan'   => 'required',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|max:25|unique:users';
        }
        if ($request->slug != $user->slug) {
            $rules['slug'] = 'required|unique:users';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }
        if (($request->password != null) && ($request->password != $user->password)) {
            $rules['password'] = 'required|min:6|max:255';
        }

        $data = $request->validate($rules);

        if ($request->password != null) {
            $data['password'] = Hash::make($data['password']);
        }

        User::where('slug', $user->slug)->update($data);
        return redirect('/admin/info/users')->with('success', 'Update User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/info/users')->with('destroy', 'Delete User Successfully');
    }
}
