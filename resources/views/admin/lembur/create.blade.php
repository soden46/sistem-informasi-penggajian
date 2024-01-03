@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Lembur') }}</h1>

                    <a href="{{ route('admin.lembur.index') }}" class="btn btn-light"> <i class="fa fa-arrow-left"></i> </a>
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

                        <form action="{{ route('admin.lembur.store') }}" method="POST">
                            @csrf
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="karyawan_id">Nama Karyawan</label>
                                <select class="form-control" style="width: 80%;" name="karyawan_id" id="v">
                                    @foreach($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="tanggal">Tanggal</label>
                                <input class="form-control" style="width: 80%;" type="date" name="tanggal" value="{{ old('tanggal') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="dari_jam">Dari Jam</label>
                                <input class="form-control" style="width: 80%;" type="time" id="dari_jam" name="dari_jam" value="{{ old('dari_jam') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="sampai_jam">Sampai Jam</label>
                                <input class="form-control" style="width: 80%;" type="time" onchange="hitungTotalJam()" id="sampai_jam" name="sampai_jam" value="{{ old('sampai_jam') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="total_jam">Total Jam Lembur</label>
                                <input class="form-control" style="width: 80%;" type="text" id="total_jam" name="total_jam" value="{{ old('total_jam') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="upah_perjam">Upah Perjam</label>
                                <input class="form-control" style="width: 80%;" type="text" onchange="hitungUpahLembur()" id="upah_perjam" name="upah_perjam" value="{{ old('upah_perjam') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="upah_lembur">Upah Lembur</label>
                                <input class="form-control" style="width: 80%;" type="text" id="upah_lembur" name="upah_lembur" value="{{ old('upah_lembur') }}">
                            </div>
                            <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                <label class="m-0" for="keterangan">Keterangan Lembur</label>
                                <input class="form-control" style="width: 80%;" type="text" name="keterangan" value="{{ old('keterangan') }}">
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
    // Fungsi untuk menghitung total jam kerja
    function hitungTotalJam() {
        var dari = parseFloat(document.getElementById('dari_jam').value);
        var sampai = parseFloat(document.getElementById('sampai_jam').value);
        // Lanjutkan dengan input jam kerja lainnya

        var totalJam = hitungSelisihJam(dari, sampai); // hitung selisih

        document.getElementById('total_jam').value = totalJam; // Menampilkan hasil total jam kerja
    }

    // Fungsi untuk menghitung selisih jam antara dua waktu
    function hitungSelisihJam(waktuAwal, waktuAkhir) {
        var jamAwal = new Date('1970-01-01T' + waktuAwal + ':00');
        var jamAkhir = new Date('1970-01-01T' + waktuAkhir + ':00');

        var selisihMillis = jamAkhir - jamAwal; // Menghitung selisih dalam milidetik
        var selisihJam = selisihMillis / (1000 * 60 * 60); // Mengonversi ke jam

        return selisihJam;
    }

    // Fungsi untuk menghitung upah lembur
    function hitungUpahLembur() {
        var jamKerjaLembur = document.getElementById('total_jam').value;
        var tarifLemburPerJam = document.getElementById('upah_perjam').value;

        var totalUpahLembur = jamKerjaLembur * tarifLemburPerJam;

        document.getElementById('upah_lembur').value = totalUpahLembur; // Menampilkan hasil total upah lembur
    }
</script>
<!-- /.content -->
@endsection