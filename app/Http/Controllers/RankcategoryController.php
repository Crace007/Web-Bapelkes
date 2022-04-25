<?php

namespace App\Http\Controllers;

use App\Models\Rankcategory;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class RankcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.category_pangkat.index', [
            'data' => Rankcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.category_pangkat.create');
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
            'nama_pangkat' => 'required|max:255',
            'slug'         => 'required|unique:rankcategories,slug',
        ]);

        Rankcategory::create($validate);

        return redirect('/admin/rankcategories')->with('success', 'New Category Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rankcategory  $rankcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Rankcategory $rankcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rankcategory  $rankcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Rankcategory $rankcategory)
    {
        return view('admin.kategori.category_pangkat.edit', [
            'category'  => $rankcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rankcategory  $rankcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rankcategory $rankcategory)
    {
        $rules = [
            'nama_pangkat'  => 'required|max:255',
        ];

        if ($request->slug != $rankcategory->slug) {
            $rules['slug'] = 'required|unique:rankcategories,slug';
        }

        $validate = $request->validate($rules);
        Rankcategory::where('id', $rankcategory->id)->update($validate);

        return redirect('/admin/rankcategories')->with('success', 'The Selected Category Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rankcategory  $rankcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rankcategory $rankcategory)
    {
        Rankcategory::destroy($rankcategory->id);
        return redirect('/admin/rankcategories')->with('success', 'The Selected Category Has Been Deleted!');
    }
}
