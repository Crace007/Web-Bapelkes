<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Models\Infocategory;
use App\Models\Otherinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OtherinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.otherinfos.index', [
            'info' => Otherinfo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.otherinfos.create', [
            'infocategories' => Infocategory::all()
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
        $validate = $request->validate([
            'title'             => 'required|max:255',
            'infocategory_id'   => 'required',
            'image'             => 'required|max:10240|mimes:jpg,jpeg,png,bmp',
            'description'       => 'required'
        ]);


        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('infopost_image');
            Otherinfo::create($validate);
        };

        return redirect('/admin/otherinfos')->with('success', 'New Info Post Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Otherinfo $otherinfo)
    {
        return view('admin.otherinfos.show', [
            'info' => $otherinfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Otherinfo $otherinfo)
    {
        return view('admin.otherinfos.edit', [
            'infocategory'  => Infocategory::all(),
            'info'  => $otherinfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Otherinfo $otherinfo)
    {
        $validate = $request->validate([
            'title'             => 'required|max:255',
            'infocategory_id'   => 'required',
            'image'             => 'max:10240|mimes:jpg,jpeg,png,bmp',
            'description'       => 'required'
        ]);

        if ($request->file('image')) {
            Storage::delete($otherinfo->image);
            $validate['image'] = $request->file('image')->store('infopost_image');
        };

        Otherinfo::where('id', $otherinfo->id)->update($validate);
        return redirect('/admin/otherinfos')->with('success', 'The Selected Info Post Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Otherinfo $otherinfo)
    {
        if ($otherinfo->image) {
            Storage::delete($otherinfo->image);
        }
        Otherinfo::destroy($otherinfo->id);
        return redirect('/admin/otherinfos')->with('destroy', 'The Selected Info Post Has Been Deleted!');
    }
}
