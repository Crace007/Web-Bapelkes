<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Jobcategory;
use App\Models\Rankcategory;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('berhasil masuk');
        return view('admin.sdm.asn.index', [
            'dataPegawai' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sdm.asn.create', [
            'rankcategories' => Rankcategory::all(),
            'jobcategories' => Jobcategory::all(),
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
            'nip'                       => 'required|min:18|max:18',
            'pangkat_id'                => 'required',
            'jabatan_id'                => 'required',
            'tanggal_pangkat'           => 'required',
            'masaKerja_thn'             => 'required',
            'masaKerja_bln'             => 'required',
            'pendidikan_terakhir'       => 'required',
            'foto_pegawai'              => 'image|max:8192'
        ]);

        $dataPegawai = [
            'nip'                       => $request->nip,
            'pangkat_id'                => $request->pangkat_id,
            'jabatan_id'                => $request->jabatan_id,
            'tanggal_pangkat'           => $request->tanggal_pangkat,
            'masaKerja_thn'             => $request->masaKerja_thn,
            'masaKerja_bln'             => $request->masaKerja_bln,
            'latihanJabatan_diklat'     => $request->latihanJabatan_diklat,
            'latihanJabatan_tahun'      => $request->latihanJabatan_tahun,
            'pendidikan_terakhir'       => $request->pendidikan_terakhir,
            'keterangan'                => $request->keterangan,
        ];

        if ($request->file('foto_pegawai')) {
            $dataPegawai['foto_pegawai'] = $request->file('foto_pegawai')->store('foto_pegawai');
        };

        $employee_id = Employee::insertGetId($dataPegawai);

        $dataUser = [
            'employee_id'   => $employee_id,
        ];
        User::where('id', $request->user_id)->update($dataUser);

        return redirect('/admin/employees')->with('success', 'New Data Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.sdm.asn.show', [
            'data' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        // dd($employee);
        return view('admin.sdm.asn.edit', [
            'data' => $employee,
            'rankcategories' => Rankcategory::all(),
            'jobcategories' => Jobcategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'pangkat_id'                => 'required',
            'jabatan_id'                => 'required',
            'tanggal_pangkat'           => 'required',
            'masaKerja_thn'             => 'required',
            'masaKerja_bln'             => 'required',
            'pendidikan_terakhir'       => 'required',
            'foto_pegawai'              => 'image|max:8192'
        ];

        if ($request->nip != $employee->nip) {
            $rules['nip'] = 'required|min:18|max:18';
        }

        $request->validate($rules);
        $data   = [
            'nip'                       => $request->nip,
            'pangkat_id'                => $request->pangkat_id,
            'jabatan_id'                => $request->jabatan_id,
            'tanggal_pangkat'           => $request->tanggal_pangkat,
            'masaKerja_thn'             => $request->masaKerja_thn,
            'masaKerja_bln'             => $request->masaKerja_bln,
            'pendidikan_terakhir'       => $request->pendidikan_terakhir,
            'keterangan'                => $request->keterangan,
        ];

        if ($request->file('foto_pegawai')) {
            Storage::delete($employee->foto_pegawai);
            $data['foto_pegawai'] = $request->file('foto_pegawai')->store('foto_pegawai');
        };

        Employee::where('id', $employee->id)->update($data);

        return redirect('/admin/employees')->with('success', 'New Data Has Been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $user = User::all();
        $dataUser = [
            'employee_id'   => null,
        ];
        foreach ($user as $item) {
            if ($item->employee_id === $employee->id) {
                User::where('id', $item->id)->update($dataUser);
            }
        }

        if ($employee->foto_pegawai) {
            Storage::delete($employee->foto_pegawai);
        }

        Employee::destroy($employee->id);
        return redirect('/admin/employees')->with('destroy', 'The Selected Data Has Been Deleted!');
    }
}
