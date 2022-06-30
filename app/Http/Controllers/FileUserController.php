<?php

namespace App\Http\Controllers;

use App\Models\Fileuser;
use App\Models\Filecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.createfile')->with([
            'categories' => Filecategory::all(),
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
            'nama'              => 'required',
            'user_id'           => 'required',
            'filecategory_id'   => 'required',
            'nama_file'         => 'max:10240|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($request->file('nama_file')) {
            $data['nama_file'] = $request->file('nama_file')->store('nama_file');
        };
        Fileuser::create($data);
        return response("data berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Fileuser::FindOrFail($id);
        return view('admin.profile.editfile')->with([
            'data' => $data,
            'categories' => Filecategory::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Fileuser $fileuser, Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fileuser $fileuser)
    {
        $data = $request->validate([
            'nama'              => 'required',
            'user_id'           => 'required',
            'filecategory_id'   => 'required',
            'nama_file'         => 'max:10240|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($request->file('nama_file')) {
            Storage::delete($request->file_user_old);
            $data['nama_file'] = $request->file('nama_file')->store('nama_file');
        };
        Fileuser::where('id', $fileuser->id)->update($data);
        return response("data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fileuser $fileuser)
    {
        Storage::delete($fileuser->nama_file);
        Fileuser::destroy($fileuser->id);
        return redirect()->back()->withInput();
    }
}
