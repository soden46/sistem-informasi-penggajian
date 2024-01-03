<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth', 'status:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['status:admin']], function () {
        Route::resource('jabatan', App\Http\Controllers\Admin\JabatanController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('karyawan', App\Http\Controllers\Admin\KaryawanController::class);
        Route::resource('lembur', App\Http\Controllers\Admin\LemburController::class);
        Route::resource('gaji', App\Http\Controllers\Admin\DataGajiController::class);
        Route::resource('potongan-gaji', App\Http\Controllers\Admin\PotonganGajiController::class);
        Route::get('absensis', [App\Http\Controllers\Admin\AbsensiController::class, 'index'])->name('absensis.index');
        Route::get('absensis/kehadiran', [App\Http\Controllers\Admin\AbsensiController::class, 'show'])->name('absensis.show');
        Route::post('absensis/kehadiran', [App\Http\Controllers\Admin\AbsensiController::class, 'store'])->name('absensis.store');
        Route::get('laporan/slip-gaji', [App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan.index');
        Route::post('laporan/slip-gaji', [App\Http\Controllers\Admin\LaporanController::class, 'store'])->name('laporan.store');
    });
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('laporan/slip-gaji/karyawan', [App\Http\Controllers\Admin\LaporanController::class, 'show'])->name('laporan.show');
    Route::post('laporan/slip-gaji/karyawan', [App\Http\Controllers\Admin\LaporanController::class, 'cekGaji'])->name('laporan.karyawan');

    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
});
