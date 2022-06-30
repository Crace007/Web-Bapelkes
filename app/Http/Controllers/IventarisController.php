<?php

namespace App\Http\Controllers;

use App\Models\Iventaris;
use Illuminate\Http\Request;

class IventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sarpras.iventaris.index', [
            'data' => Iventaris::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarpras.iventaris.create');
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
            'nama'          => 'required',
            'type'          => '',
            'kode_barang'   => 'required',
            'kode_lokasi'   => '',
            'nup'           => '',
            'thn_pembelian' => 'required',
            'jumlah'        => 'required',
            'harga'         => 'required',
            'kondisi'       => 'required',
            'keterangan'    => '',
        ]);

        Iventaris::create($data);
        return redirect('/admin/iventaris')->with('success', 'Iventaris Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iventaris  $iventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Iventaris $iventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iventaris  $iventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Iventaris $iventari)
    {
        return view('admin.sarpras.iventaris.edit', [
            'data' => $iventari,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Iventaris  $iventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iventaris $iventari)
    {
        $data = $request->validate([
            'nama'          => 'required',
            'type'          => '',
            'kode_barang'   => 'required',
            'kode_lokasi'   => '',
            'nup'           => '',
            'thn_pembelian' => 'required',
            'jumlah'        => 'required',
            'harga'         => 'required',
            'kondisi'       => 'required',
            'keterangan'    => '',
        ]);

        Iventaris::where('id', $iventari->id)->update($data);
        return redirect('/admin/iventaris')->with('success', 'Iventaris Has Been Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iventaris  $iventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iventaris $iventari)
    {
        Iventaris::destroy($iventari->id);
        return redirect('/admin/iventaris')->with('destroy', 'Iventaris Has Been Deleted!');
    }
}
