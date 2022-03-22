<?php

namespace App\Http\Controllers;

use App\Models\Infocategory;
use App\Models\Otherinfo;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Otherinfo $otherinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Otherinfo $otherinfo)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Otherinfo  $otherinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Otherinfo $otherinfo)
    {
        //
    }
}
