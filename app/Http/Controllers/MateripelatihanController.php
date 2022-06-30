<?php

namespace App\Http\Controllers;

use App\Models\Materipelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MateripelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jadwal_pelatihan.materi_pelatihan.read', [
            'data' => Materipelatihan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal_pelatihan.materi_pelatihan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelatihan_id'      => 'required',
            'upload_by'         => 'required',
            'nama'              => 'required',
        ]);

        $data = [
            'nama'              => $request->nama,
            'pelatihan_id'      => $request->pelatihan_id,
            'upload_by'         => $request->upload_by,
        ];

        Materipelatihan::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materipelatihan  $materipelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(Materipelatihan $materipelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materipelatihan  $materipelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Materipelatihan $materipelatihan)
    {
        return view('admin.jadwal_pelatihan.materi_pelatihan.edit', [
            'data' => $materipelatihan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materipelatihan  $materipelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materipelatihan $materipelatihan)
    {
        $request->validate([
            'pelatihan_id'      => 'required',
            'upload_by'         => 'required',
            'nama'              => 'required|max:255',
        ]);

        $data = [
            'nama'              => $request->nama,
            'pelatihan_id'      => $request->pelatihan_id,
            'upload_by'         => $request->upload_by,
        ];

        Materipelatihan::where('id', $materipelatihan->id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materipelatihan  $materipelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materipelatihan $materipelatihan)
    {
        Materipelatihan::destroy($materipelatihan->id);
        return redirect()->back()->with('destroy', 'The Selected Category Has Been Deleted!')->withInput();
    }
}
