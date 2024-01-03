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

                        <form action="{{ route('admin.karyawan.store') }}" method="POST">
                            @csrf
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="jabatan">Jabatan</label>
                                <select class="form-control" style="width: 80%;" name="jabatan_id" id="jabatan">
                                    @foreach($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="nik">NIK</label>
                                <input class="form-control" style="width: 80%;" type="text" name="nik" value="{{ old('nik') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="nama">Nama</label>
                                <input class="form-control" style="width: 80%;" type="text" name="nama" value="{{ old('nama') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" style="width: 80%;" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="agama">Agama</label>
                                <input class="form-control" style="width: 80%;" type="text" name="agama" value="{{ old('agama') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="status_karyawan">Status</label>
                                <select class="form-control" style="width: 80%;" name="status_karyawan" id="status_karyawan">
                                    <option value="Pegawai Tetap">Pegawai Tetap</option>
                                    <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
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