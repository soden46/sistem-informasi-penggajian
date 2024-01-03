<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KaryawanRequest;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::with('jabatans')->paginate();
        //dd($karyawan);

        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::get(['id', 'nama']);

        return view('admin.karyawan.create', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryawanRequest $request)
    {
        Karyawan::create($request->validated());

        return redirect()->route('admin.karyawan.index')->with([
            'message' => 'berhasil di buat',
            'alert-info' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('admin.karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $jabatans = Jabatan::get(['id', 'nama']);

        return view('admin.karyawan.edit', compact('karyawan', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update($request->validated());

        return redirect()->route('admin.karyawan.index')->with([
            'message' => 'berhasil di edit',
            'alert-info' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-info' => 'danger'
        ]);
    }
}
