@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->




<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between">
                <h1 class="m-0">{{ __('Lembur') }}</h1>

                <a href="{{ route('admin.lembur.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
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
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Dari Jam</th>
                                        <th>Sampai Jam</th>
                                        <th>Keterangan</th>
                                        <th>Upah Perjam</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lembur as $lemburs)
                                    <tr>
                                        <td>{{ $lemburs->karyawans->nama }}</td>
                                        <td>{{ $lemburs->karyawans->jenis_kelamin }}</td>
                                        <td>{{ $lemburs->karyawans->jabatans->nama}}</td>
                                        <td>{{ $lemburs->tanggal}}</td>
                                        <td>{{ $lemburs->dari_jam}}</td>
                                        <td>{{ $lemburs->sampai_jam}}</td>
                                        <td>{{ $lemburs->keterangan}}</td>
                                        <td>{{ $lemburs->upah_perjam}}</td>
                                        <td>{{ $lemburs->upah_lembur}}</td>
                                        <td>{{ $lemburs->karyawans->status_karyawan ? 'pegewai tetap' : 'pegawai tidak tetap' }}</td>
                                        <td>
                                            <a href="{{ route('admin.lembur.show', $lemburs->id) }}" class="btn-sm btn-warning d-inline-block mx-1"> <i class="text-white fa fa-eye"></i> </a>
                                            <a href="{{ route('admin.lembur.edit', $lemburs->id) }}" class="btn-sm btn-info d-inline-block"> <i class="fa fa-edit"></i> </a>
                                            <form class="d-inline-block m-1" onclick="return confirm('anda yakin ? ');" action="{{ route('admin.lembur.destroy', $lemburs->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer clearfix">
                        {{ $lembur->links() }}
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection