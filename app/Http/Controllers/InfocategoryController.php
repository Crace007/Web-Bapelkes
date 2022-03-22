<?php

namespace App\Http\Controllers;

use App\Models\Infocategory;
use Illuminate\Http\Request;

class InfocategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoryinfos.index', [
            'data'  => Infocategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryinfos.create');
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
            'slug'         => 'required|unique:categories,slug',
        ]);

        Infocategory::create($validate);

        return redirect('/admin/categoryinfos')->with('success', 'New Info Category Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infocategory  $infocategory
     * @return \Illuminate\Http\Response
     */
    public function show(Infocategory $infocategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infocategory  $infocategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Infocategory $infocategory)
    {
        return view('admin.categoryinfos.edit', [
            'category'  => $infocategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infocategory  $infocategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infocategory $infocategory)
    {
        $rules = [
            'name'  => 'required|max:255',
        ];

        if ($request->slug != $infocategory->slug) {
            $rules['slug'] = 'required|unique:categories,slug';
        }

        $validate = $request->validate($rules);
        Infocategory::where('id', $infocategory->id)->update($validate);

        return redirect('/admin/infocategories')->with('success', 'The Selected Info Category Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infocategory  $infocategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infocategory $infocategory)
    {
        Infocategory::destroy($infocategory->id);
        return redirect('/admin/infocategories')->with('success', 'The Selected info Category Has Been Deleted!');
    }
}
