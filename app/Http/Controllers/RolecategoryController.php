<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.category_role.index', [
            'data' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.category_role.create');
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
            'nama' => 'required|max:50|unique:roles'
        ]);

        Role::create($data);

        return redirect('/admin/rolecategories')->with('success', 'New Roles Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $rolecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $rolecategory)
    {
        return view('admin.kategori.category_role.edit', [
            'data' => $rolecategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $rolecategory)
    {
        $data = $request->validate([
            'nama' => 'required|max:50|unique:roles'
        ]);

        Role::where('id', $rolecategory->id)->update($data);

        return redirect('/admin/rolecategories')->with('success', 'New Roles Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $rolecategory)
    {
        Role::destroy($rolecategory->id);
        return redirect('/admin/rolecategories')->with('destroy', 'New Roles Has Been Deleted!');
    }
}
