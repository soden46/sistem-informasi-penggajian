@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Karyawan') }}</h1>

                    <a href="{{ route('admin.karyawan.index') }}" class="btn btn-light"> <i class="fa fa-arrow-left"></i> </a>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-3">

                        <form action="{{ route('admin.karyawan.update', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="jabatan">Jabatan</label>
                                <select class="form-control" style="width: 80%;" name="jabatan_id" id="jabatan">
                                    @foreach($jabatans as $jabatan)
                                    <option {{ $karyawan->jabatan_id === $jabatan->id ? 'selected' : null }} value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="nik">Nik</label>
                                <input class="form-control" style="width: 80%;" type="number" name="nik" value="{{ old('nik', $karyawan->nik) }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="nama">Nama</label>
                                <input class="form-control" style="width: 80%;" type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" style="width: 80%;" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="laki-laki" {{ $karyawan->jenis_kelamin === 'laki-laki' ? 'selected' : null }}>Laki-Laki</option>
                                    <option value="perempuan" {{ $karyawan->jenis_kelamin === 'perempuan' ? 'selected' : null }}>Perempuan</option>
                                </select>
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="agama">Agama</label>
                                <input class="form-control" style="width: 80%;" type="text" name="agama" value="{{ old('agama', $karyawan->agama) }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="status_karyawan">Status</label>
                                <select class="form-control" style="width: 80%;" name="status_karyawan" id="status_karyawan">
                                    <option value="Pegawai Tetap" {{ $karyawan->status_karyawan === 'Pegawai Tetap' ? 'selected' : null }}>Pegawai Tetap</option>
                                    <option value="Pegawai Tidak Tetap" {{ $karyawan->status_karyawan === 'Pegawai Tidak Tetap' ? 'selected' : null }}>Pegawai Tidak Tetap</option>
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection