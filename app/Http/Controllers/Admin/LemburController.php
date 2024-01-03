<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lembur;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LemburRequest;
use App\Models\Karyawan;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembur = Lembur::with('karyawans')->paginate();
        // dd($lembur);

        return view('admin.lembur.index', compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::get(['id', 'nama']);

        return view('admin.lembur.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LemburRequest $request)
    {
        Lembur::create($request->validated());

        return redirect()->route('admin.lembur.index')->with([
            'message' => 'berhasil di buat',
            'alert-info' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembur $lembur)
    {
        return view('admin.lembur.show', compact('lembur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lembur $lembur)
    {
        $karyawans = Karyawan::get();
        return view('admin.lembur.edit', compact('lembur', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LemburRequest $request, Lembur $lembur)
    {
        $lembur->update($request->validated());

        return redirect()->route('admin.lembur.index')->with([
            'message' => 'berhasil di edit',
            'alert-info' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembur $lembur)
    {
        $lembur->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-info' => 'danger'
        ]);
    }
}
