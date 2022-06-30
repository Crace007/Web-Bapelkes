<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mitra.index', [
            'data' => Mitra::all()
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
        return view('admin.mitra.create');
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
            'nama'       => 'required',
            'slug'       => 'required',
            'link_mitra' => '',
            'logo'       => 'required|max:3072',
        ]);

        if ($request->file('logo')) {
            $data['logo'] = $request->file('logo')->store('logo_mitra');
        };

        Mitra::create($data);
        return redirect('/admin/mitra')->with('success', 'New Data Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        return view('admin.mitra.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        return view('admin.mitra.edit', [
            'data' => $mitra
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mitra $mitra)
    {
        $rules = [
            'nama'       => 'required',
            'link_mitra' => '',
            'logo'       => 'max:3072',
        ];

        if ($request->slug != $mitra->slug) {
            $rules['slug'] = 'required|unique:mitras,slug';
        }

        $data = $request->validate($rules);

        if ($request->file('logo')) {
            Storage::delete($mitra->logo);
            $data['logo'] = $request->file('logo')->store('logo_mitra');
        };

        Mitra::where('slug', $mitra->slug)->update($data);
        return redirect('/admin/mitra')->with('success', 'New Data Has Been Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        if ($mitra->logo) {
            Storage::delete($mitra->logo);
        }
        Mitra::destroy($mitra->id);
        return redirect('/admin/mitra')->with('destroy', 'The Selected Data Has Been Deleted!');
    }
}
