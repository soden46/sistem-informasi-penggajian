@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->




<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between">
                <h1 class="m-0">{{ __('Karyawan') }}</h1>

                <a href="{{ route('admin.karyawan.index') }}" class="btn btn-light"> kembali </a>
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
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $karyawan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nik</th>
                                        <td>{{ $karyawan->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $karyawan->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>{{ $karyawan->jabatan->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $karyawan->status ? 'Pegawai Tetap' : 'Pegawai Tidak Tetap' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection