<?php

namespace App\Http\Controllers;

use App\Models\FasilitasSarana;
use App\Models\Fotosarana;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sarpras.sarana.index', [
            'data' => Sarana::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarpras.sarana.create');
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
            'nama' => 'required',
            'slug' => 'required',
            'jumlah' => 'required',
            'kapasitas' => 'required',
        ]);

        Sarana::create($data);
        return redirect('/admin/sarana')->with('success', 'New Data Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        return view('admin.sarpras.sarana.show', [
            'data' => $sarana,
            'fasilitas' => FasilitasSarana::where('sarana_id', $sarana->id)->get(),
            'fotosarana' => Fotosarana::where('sarana_id', $sarana->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Sarana $sarana)
    {
        return view('admin.sarpras.sarana.edit', [
            'data' => $sarana
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sarana $sarana)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'kapasitas' => 'required',
        ]);

        if ($request->slug != $sarana->slug) {
            $rules['slug'] = 'required|unique:saranas,slug';
        }

        Sarana::where('slug', $sarana->slug)->update($data);
        return redirect('/admin/sarana')->with('success', 'New Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sarana $sarana)
    {

        $fasilitas = FasilitasSarana::where('sarana_id', $sarana->id)->get();
        $foto = Fotosarana::where('sarana_id', $sarana->id)->get();

        foreach ($fasilitas as $item) {
            FasilitasSarana::destroy($item->id);
        }

        foreach ($foto as $item) {
            if ($item->foto) {
                Storage::delete($item->foto);
            }
            Fotosarana::destroy($item->id);
        }

        Sarana::destroy($sarana->id);
        return redirect('/admin/sarana')->with('destroy', 'The Selected Data Has Been Deleted!');
    }
}
