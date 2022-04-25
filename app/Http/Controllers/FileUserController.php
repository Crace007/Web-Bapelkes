<?php

namespace App\Http\Controllers;

use App\Models\Fileuser;
use Illuminate\Http\Request;

class FileUserController extends Controller
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
        $data = $request->validate([
            'name'          => 'required',
            'slug'          => 'required|unique:fileusers,slug',
            'category_id'   => 'required',
            'user_id'       => 'required',
            'file_user'     => 'max:10240|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($request->file('file_user')) {
            $data['file_user'] = $request->file('file_user')->store('file_user');
        };
        Fileuser::create($data);
        return response("data berhasil diubah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function show(Fileuser $fileuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Fileuser $fileuser)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fileuser  $fileuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fileuser $fileuser)
    {
        //
    }
}
