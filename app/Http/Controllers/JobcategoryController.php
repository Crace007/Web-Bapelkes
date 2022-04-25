<?php

namespace App\Http\Controllers;

use App\Models\Jobcategory;
use Illuminate\Http\Request;

class JobcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.category_jabatan.index', [
            'data'  => Jobcategory::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.category_jabatan.create');
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
            'nama_jabatan' => 'required|max:255',
            'slug'         => 'required|unique:jobcategories,slug',
        ]);

        Jobcategory::create($validate);

        return redirect('/admin/jobcategories')->with('success', 'New Category Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Jobcategory $jobcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobcategory $jobcategory)
    {
        return view('admin.kategori.category_jabatan.edit', [
            'category'  => $jobcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobcategory $jobcategory)
    {
        $rules = [
            'nama_jabatan'  => 'required|max:255',
        ];

        if ($request->slug != $jobcategory->slug) {
            $rules['slug'] = 'required|unique:jobcategories,slug';
        }

        $validate = $request->validate($rules);
        Jobcategory::where('id', $jobcategory->id)->update($validate);

        return redirect('/admin/jobcategories')->with('success', 'The Selected Category Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobcategory $jobcategory)
    {
        Jobcategory::destroy($jobcategory->id);
        return redirect('/admin/jobcategories')->with('destroy', 'The Selected Category Has Been Deleted!');
    }
}
