<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataGajiRequest;
use App\Models\DataGaji;
use App\Models\Karyawan;

class DataGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = DataGaji::with('karyawans')->paginate();
        // dd($lembur);

        return view('admin.gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::get(['id', 'nama']);

        return view('admin.gaji.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataGajiRequest $request)
    {
        DataGaji::create($request->validated());

        return redirect()->route('admin.gaji.index')->with([
            'message' => 'berhasil di buat',
            'alert-info' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DataGaji $gaji)
    {
        // dd($gaji);
        return view('admin.gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataGaji $gaji)
    {
        $karyawans = Karyawan::get();
        return view('admin.gaji.edit', compact('gaji', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataGajiRequest $request, DataGaji $gaji)
    {
        $gaji->update($request->validated());

        return redirect()->route('admin.gaji.index')->with([
            'message' => 'berhasil di edit',
            'alert-info' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataGaji $Datagaji)
    {
        $Datagaji->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-info' => 'danger'
        ]);
    }
}
