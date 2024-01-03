@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->




<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between">
                <h1 class="m-0">{{ __('Data Gaji') }}</h1>

                <a href="{{ route('admin.gaji.index') }}" class="btn btn-light"> kembali </a>
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
                                        <th>Nik</th>
                                        <td>{{ $gaji->karyawans->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $gaji->karyawans->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $gaji->karyawans->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>{{ $gaji->karyawans->jabatans->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gaji Pokok</th>
                                        <td>{{ $gaji->gaji_pokok}}</td>
                                    </tr>
                                    <tr>
                                        <th>Biaya Transport</th>
                                        <td>{{ $gaji->transportasi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Uang Makan</th>
                                        <td>{{ $gaji->uang_makan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Potongan</th>
                                        <td>{{ $gaji->potongan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Gaji Yang Diterima</th>
                                        <td>{{ $gaji->total_gaji}}</td>
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