@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Data Gaji') }}</h1>

                    <a href="{{ route('admin.gaji.index') }}" class="btn btn-light"> <i class="fa fa-arrow-left"></i> </a>
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

                        <form action="{{ route('admin.gaji.update', $gaji->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="karyawan_id">Nama Karyawan</label>
                                <select class="form-control" style="width: 80%;" name="karyawan_id" id="v">
                                    @foreach($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="gaji_pokok">Gaji Pokok</label>
                                <input class="form-control" style="width: 80%;" type="number" onchange="hitungTotalGaji()" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok',$gaji->gaji_pokok) }}" min="0">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="transportasi">Transportasi</label>
                                <input class="form-control" style="width: 80%;" type="number" onchange="hitungTotalGaji()" id="transportasi" name="transportasi" value="{{ old('transportasi',$gaji->transportasi) }}" min="0">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="uang_makan">Uang Makan</label>
                                <input class="form-control" style="width: 80%;" type="number" onchange="hitungTotalGaji()" id="uang_makan" name="uang_makan" value="{{ old('uang_makan',$gaji->uang_makan) }}" min="0">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="potongan">Potongan</label>
                                <input class="form-control" style="width: 80%;" type="number" onchange="hitungTotalGaji()" id="potongan" name="potongan" value="{{ old('potongan',$gaji->potongan) }}" placeholder="isi angka 0 jika tidak ada potongan" min="0">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="total_gaji">total Gaji</label>
                                <input class="form-control" style="width: 80%;" type="text" id="total_gaji" name="total_gaji" value="{{ old('total_gaji') }}" min="0">
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
<script>
    // Fungsi untuk menghitung total gaji
    function hitungTotalGaji() {
        var gajiPokok = parseFloat(document.getElementById('gaji_pokok').value) || 0;
        var transportasi = parseFloat(document.getElementById('transportasi').value) || 0;
        var uangMakan = parseFloat(document.getElementById('uang_makan').value) || 0;
        var potongan = parseFloat(document.getElementById('potongan').value) || 0;

        var totalGaji = gajiPokok + transportasi + uangMakan - potongan; // Hitung total gaji

        document.getElementById('total_gaji').value = totalGaji; // Menampilkan hasil total gaji
    }
</script>
<!-- /.content -->
@endsection