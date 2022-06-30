<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Filecategory;
use App\Models\Fileuser;
use App\Models\User;
use App\Models\Imagepost;
use App\Models\Post;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai   = Employee::where('id', auth()->user()->employee_id)->get()->first();
        // dd($pegawai);

        return view('admin.profile.index', [
            'imagepost' => Imagepost::all(),
            'posts'     => Post::latest()->where('user_id', auth()->user()->id)->get(),
            'pegawai'   => Employee::where('id', auth()->user()->employee_id)->get()->first(),
            'personal'  => User::where('id', auth()->user()->id)->get(),
            'user'      => User::all(),
            'fileuser'  => Fileuser::all(),
            'filepersonal'  => Fileuser::where('user_id', auth()->user()->id)->get(),
            'categories' => Filecategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.profile.edit', [
            'user' => $user
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
        $data = $request->validate([
            'name'              => 'required|max:60',
            'tempat_lahir'      => 'required|max:25',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'status_hubungan'   => 'required',
            'about'             => 'max:255',
        ]);

        User::where('slug', $user->slug)
            ->update($data);

        return redirect('/admin/users/' . $user->slug . '/edit')->with('success', 'Profile Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function uploadPP(Request $request)
    {
        $data = $request->validate([
            'photo_profile'  => 'max:10240|mimes:jpg,jpeg,png,bmp',
        ]);

        if ($request->file('photo_profile')) {
            Storage::delete($request->photoProfile_old);
            $data['photo_profile'] = $request->file('photo_profile')->store('photo_profile');
        };
        User::where('id', $request->user_id)->update($data);
        return response("data berhasil diubah");
    }

    public function removePP($users)
    {
        $data['photo_profile'] = null;
        User::where('id', $users)->update($data);
        return view('admin.profile.index');
    }

    public function setting()
    {
        return view('admin.profile.setting');
    }

    public function updateUsername(Request $request)
    {
        $user = User::where('slug', $request->slug_old)->get()->first();
        // dd($user);
        $data = $request->validate([
            'username'          => 'required|max:25|unique:users',
            'slug'              => 'required|unique:users',
        ]);

        if (Hash::check($request->password1, $user->password)) {
            User::where('slug', $user->slug)
                ->update($data);
            return redirect('admin/users/setting')->with('success', 'Username telah di perbaharui');
        } else {
            return redirect('admin/users/setting')->with('destroy', 'Password yang di input Salah');
        }
    }

    public function updateEmail(Request $request)
    {
        $user = User::where('slug', $request->slug_old2)->get()->first();
        // dd($user);
        $data = $request->validate([
            'email'             => 'required|email:dns|unique:users',
        ]);

        if (Hash::check($request->password2, $user->password)) {
            User::where('slug', $user->slug)
                ->update($data);
            return redirect('admin/users/setting')->with('success', 'Email telah di perbaharui');
        } else {
            return redirect('admin/users/setting')->with('destroy', 'Password yang di input Salah');
        }
    }

    public function updatePassword(Request $request)
    {
        $user = User::where('slug', $request->slug_old3)->get()->first();
        // dd($user);
        $data = $request->validate([
            'password' => 'required|min:5|max:255'
        ]);

        $data['password'] = Hash::make($data['password']);

        if (Hash::check($request->password3, $user->password)) {
            User::where('slug', $user->slug)
                ->update($data);
            return redirect('admin/users/setting')->with('success', 'Email telah di perbaharui');
        } else {
            return redirect('admin/users/setting')->with('destroy', 'Password yang di input Salah');
        }
    }
}
