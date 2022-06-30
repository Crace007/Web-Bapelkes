<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Trainingschedule;
use App\Models\Employeel;
use App\Models\Materipelatihan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class TrainingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'admin.jadwal_pelatihan.index',
            [
                'data' => Trainingschedule::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal_pelatihan.create', [
            'data' => Employee::all(),
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
        $request->validate([
            'nama_pelatihan'            => 'required',
            'slug'                      => 'required|unique:trainingschedules,slug',
            'jumlah_peserta'            => 'required',
            'tanggal_start'             => 'required',
            'tanggal_end'               => 'required',
            'lama_jpl'                  => 'required',
            'lama_hari'                 => 'required',
            'metode'                    => 'required',
            'instansi_penyelenggara'    => 'required',
            'tempat_penyelenggaraan'    => 'required',
            'sumber_dana'               => 'required',
        ]);

        $validate = [
            'nama_pelatihan'            => $request->nama_pelatihan,
            'slug'                      => $request->slug,
            'jumlah_peserta'            => $request->jumlah_peserta,
            'tanggal_start'             => $request->tanggal_start,
            'tanggal_end'               => $request->tanggal_end,
            'lama_jpl'                  => $request->lama_jpl,
            'lama_hari'                 => $request->lama_hari,
            'metode'                    => $request->metode,
            'instansi_penyelenggara'    => $request->instansi_penyelenggara,
            'tempat_penyelenggaraan'    => $request->tempat_penyelenggaraan,
            'sumber_dana'               => $request->sumber_dana,
            'pengendaliPelatihan_id'    => $request->pengendaliPelatihan_id,
            'penanggungJawab_id'        => $request->penanggungJawab_id,
            'ketuaPanitia_id'           => $request->ketuaPanitia_id,
            'keterangan'                => $request->keterangan,
        ];


        Trainingschedule::create($validate);
        return redirect('/admin/trainingschedule')->with('success', 'New Training Schedule Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainingschedule  $trainingschedule
     * @return \Illuminate\Http\Response
     */
    public function show(Trainingschedule $trainingschedule)
    {
        // $materi = Materipelatihan::where('pelatihan_id', $trainingschedule->id)->get();
        // dd($materi);
        return view('admin.jadwal_pelatihan.show', [
            'pegawai' => Employee::all(),
            'materi' => Materipelatihan::where('pelatihan_id', $trainingschedule->id)->get(),
            'data'  => $trainingschedule,
            'datapelatihan'  => $trainingschedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainingschedule  $trainingschedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainingschedule $trainingschedule)
    {
        return view('admin.jadwal_pelatihan.edit', [
            'data' => Employee::all(),
            'pelatihan' => $trainingschedule,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainingschedule  $trainingschedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainingschedule $trainingschedule)
    {
        $rules = [
            'nama_pelatihan'            => 'required',
            'jumlah_peserta'            => 'required',
            'tanggal_start'             => 'required',
            'tanggal_end'               => 'required',
            'lama_jpl'                  => 'required',
            'lama_hari'                 => 'required',
            'metode'                    => 'required',
            'instansi_penyelenggara'    => 'required',
            'tempat_penyelenggaraan'    => 'required',
            'sumber_dana'               => 'required',
        ];

        if ($request->slug != $trainingschedule->slug) {
            $rules['slug'] = 'required|unique:trainingschedules,slug';
        }

        $request->validate($rules);

        $validate = [
            'nama_pelatihan'            => $request->nama_pelatihan,
            'slug'                      => $request->slug,
            'jumlah_peserta'            => $request->jumlah_peserta,
            'tanggal_start'             => $request->tanggal_start,
            'tanggal_end'               => $request->tanggal_end,
            'lama_jpl'                  => $request->lama_jpl,
            'lama_hari'                 => $request->lama_hari,
            'metode'                    => $request->metode,
            'instansi_penyelenggara'    => $request->instansi_penyelenggara,
            'tempat_penyelenggaraan'    => $request->tempat_penyelenggaraan,
            'sumber_dana'               => $request->sumber_dana,
            'pengendaliPelatihan_id'    => $request->pengendaliPelatihan_id,
            'penanggungJawab_id'        => $request->penanggungJawab_id,
            'ketuaPanitia_id'           => $request->ketuaPanitia_id,
            'keterangan'                => $request->keterangan,
        ];


        Trainingschedule::where('id', $trainingschedule->id)->update($validate);
        return redirect('/admin/trainingschedule')->with('success', 'Training Schedule Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainingschedule  $trainingschedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainingschedule $trainingschedule)
    {
        Trainingschedule::destroy($trainingschedule->id);
        return redirect('/admin/trainingschedule')->with('destroy', 'The Selected Post Has Been Deleted!');
    }
}
