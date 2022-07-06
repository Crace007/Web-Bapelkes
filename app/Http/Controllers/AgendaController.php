<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agenda.index', [
            'data' => Agenda::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.create', [
            'user' => User::all(),
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
        $data = $request->validate([
            'title'             => 'required',
            'slug'              => 'required|unique:agendas,slug',
            'tanggal_mulai'     => 'required',
            'tanggal_selesai'  => 'required',
            'user_id'           => 'required',
            'body'              => 'required'
        ]);

        $data['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');

        Agenda::create($data);
        return redirect('/admin/agenda')->with('success', 'List Agenda Baru Telah Ditambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('admin.agenda.show', [
            'data' => $agenda,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', [
            'user' => User::all(),
            'data' => $agenda,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $rules = [
            'title'             => 'required',
            'tanggal_mulai'     => 'required',
            'tanggal_selesai'   => 'required',
            'user_id'           => 'required',
            'body'              => 'required'
        ];

        if ($request->slug != $agenda->slug) {
            $rules['slug']  = 'required|unique:agendas,slug';
        }

        $data = $request->validate($rules);

        $data['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');

        Agenda::where('id', $agenda->id)->update($data);
        return redirect('/admin/agenda')->with('success', 'List Agenda Baru Telah Perbaharui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);
        return redirect('/admin/agenda')->with('destroy', 'List Agenda Baru Telah Dihapus !!!');
    }
}
