<?php

namespace App\Http\Controllers;

use App\Models\FasilitasSarana;
use App\Models\Sarana;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //cara menampilkan data fasilitas ssesui id sarana  ??
        return view('admin.sarpras.sarana.fasilitas.index', [
            'data' => FasilitasSarana::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarpras.sarana.fasilitas.create');
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
            'fasilitas' => 'required',
            'unit' => '',
        ]);

        FasilitasSarana::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasSarana  $fasilitasSarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        return view('admin.sarpras.sarana.fasilitas.index', [
            'data' => FasilitasSarana::where('sarana_id', $sarana->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasSarana  $fasilitasSarana
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasSarana $fasilita)
    {
        return view('admin.sarpras.sarana.fasilitas.edit', [
            'data' => $fasilita
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasSarana  $fasilitasSarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasSarana $fasilita)
    {
        //
        $data = $request->validate([
            'sarana_id' => 'required',
            'fasilitas' => 'required',
            'unit' => '',
        ]);

        FasilitasSarana::where('id', $fasilita->id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasSarana  $fasilitasSarana
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasSarana $fasilita)
    {
        FasilitasSarana::destroy($fasilita->id);
        return redirect()->back()->with('destroy', 'The Selected Fasilitas Has Been Deleted!')->withInput();
    }
}
