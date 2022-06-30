<?php

namespace App\Http\Controllers;

use App\Models\FasilitasSarana;
use App\Models\Fotosarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotosaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sarpras.sarana.foto.index', [
            'data' => Fotosarana::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarpras.sarana.foto.create');
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
            'sarana_id' => 'required',
            'nama' => 'required|max:100',
            'foto' => 'required'
        ]);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_sarana');
        }

        Fotosarana::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotosarana  $fotosarana
     * @return \Illuminate\Http\Response
     */
    public function show(Fotosarana $fotosarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotosarana  $fotosarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotosarana $fotosarana)
    {
        return view('admin.sarpras.sarana.foto.edit', [
            'data' => $fotosarana
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotosarana  $fotosarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotosarana $fotosarana)
    {
        $data = $request->validate([
            'sarana_id' => 'required',
            'nama' => 'required|max:100',
            'foto' => ''
        ]);

        if ($request->file('foto')) {
            Storage::delete($fotosarana->foto);
            $data['foto'] = $request->file('foto')->store('foto_sarana');
        }

        Fotosarana::where('id', $fotosarana->id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotosarana  $fotosarana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotosarana $fotosarana)
    {
        if ($fotosarana->foto) {
            Storage::delete($fotosarana->foto);
        }

        Fotosarana::destroy($fotosarana->id);
        return redirect()->back()->with('destroy', 'The Selected Fasilitas Has Been Deleted!')->withInput();
    }
}
