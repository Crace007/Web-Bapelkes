<?php

namespace App\Http\Controllers;

use App\Models\Filecategory;
use Illuminate\Http\Request;

class FilecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.category_file.index', [
            'data' => Filecategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.category_file.create');
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
            'name'         => 'required|max:255',
            'slug'         => 'required|unique:filecategories,slug',
        ]);

        Filecategory::create($validate);

        return redirect('/admin/filecategories')->with('success', 'New File Category Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filecategory  $filecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Filecategory $filecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filecategory  $filecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Filecategory $filecategory)
    {
        return view('admin.kategori.category_file.edit', [
            'category'  => $filecategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filecategory  $filecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filecategory $filecategory)
    {
        $rules = [
            'name'  => 'required|max:255',
        ];

        if ($request->slug != $filecategory->slug) {
            $rules['slug'] = 'required|unique:filecategories,slug';
        }

        $validate = $request->validate($rules);
        Filecategory::where('slug', $filecategory->slug)->update($validate);

        return redirect('/admin/filecategories')->with('success', 'The Selected File Category Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filecategory  $filecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filecategory $filecategory)
    {
        Filecategory::destroy($filecategory->id);
        return redirect('/admin/filecategories')->with('success', 'The Selected File Category Has Been Deleted!');
    }
}
