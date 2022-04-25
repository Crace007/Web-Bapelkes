<?php

namespace App\Http\Controllers;

use App\Models\Postcategory;
use Illuminate\Http\Request;

class PostcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.category_post.index', [
            'categories'  => Postcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.category_post.create');
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
            'slug'         => 'required|unique:postcategories,slug',
        ]);

        Postcategory::create($validate);

        return redirect('/admin/postcategories')->with('success', 'New Category Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postcategory  $postcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Postcategory $postcategory)
    {
        return view('admin/postcategories/edit', [
            'category'  => $postcategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postcategory  $postcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Postcategory $postcategory)
    {
        return view('admin.kategori.category_post.edit', [
            'category'  => $postcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postcategory  $postcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postcategory $postcategory)
    {
        $rules = [
            'name'  => 'required|max:255',
        ];

        if ($request->slug != $postcategory->slug) {
            $rules['slug'] = 'required|unique:postcategories,slug';
        }

        $validate = $request->validate($rules);
        Postcategory::where('id', $postcategory->id)->update($validate);

        return redirect('/admin/postcategories')->with('success', 'The Selected Category Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postcategory  $postcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postcategory $postcategory)
    {
        Postcategory::destroy($postcategory->id);
        return redirect('/admin/categories')->with('destroy', 'The Selected Category Has Been Deleted!');
    }
}
