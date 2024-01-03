@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->




<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between">
                <h1 class="m-0">{{ __('Data Gaji') }}</h1>

                <a href="{{ route('admin.gaji.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
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
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Transport</th>
                                        <th>Uang Makan</th>
                                        <th>Potongan</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gaji as $gajis)
                                    <tr>
                                        <td>{{ $gajis->karyawans->nik }}</td>
                                        <td>{{ $gajis->karyawans->nama }}</td>
                                        <td>{{ $gajis->karyawans->jenis_kelamin }}</td>
                                        <td>{{ $gajis->karyawans->jabatans->nama}}</td>
                                        <td>{{ $gajis->gaji_pokok}}</td>
                                        <td>{{ $gajis->transportasi}}</td>
                                        <td>{{ $gajis->uang_makan}}</td>
                                        <td>{{ $gajis->potongan}}</td>
                                        <td>{{ $gajis->total_gaji}}</td>
                                        <td>
                                            <a href="{{ route('admin.gaji.show', $gajis->id) }}" class="btn-sm btn-warning d-inline-block mx-1"> <i class="text-white fa fa-eye"></i> </a>
                                            <a href="{{ route('admin.gaji.edit', $gajis->id) }}" class="btn-sm btn-info d-inline-block"> <i class="fa fa-edit"></i> </a>
                                            <form class="d-inline-block m-1" onclick="return confirm('anda yakin ? ');" action="{{ route('admin.gaji.destroy', $gajis->id) }}" method="post">
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
                        {{ $gaji->links() }}
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection