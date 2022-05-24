<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\pulsaController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\ruanganController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

Route::get('/', function () {
    return view('admin-side.page-admin.home-admin');
});

//Makanan Minuman
Route::get('/kelolaproduk', [produkController::class, 'index']);
Route::get('/tambah-produk', [produkController::class, 'create']);
Route::get('/edit-produk/{id}', [produkController::class, 'edit']);
Route::post('/edit-produk-kantin/{id}', [produkController::class, 'update'])->name('produk.ubah');
Route::post('/tambah-produk-kantin/store', [produkController::class, 'store'])->name('formproduk.store');
Route::get('/produk/delete/{id}', [produkController::class, 'delete'])->name('produk.hapus');

//kelola barang
Route::get('/kelolabarang', [barangController::class, 'index']);
Route::get('/tambah-barang', [barangController::class, 'create']);
Route::get('/edit-barang/{id}', [barangController::class, 'edit']);
Route::post('/edit-barang-koperasi/{id}', [barangController::class, 'update'])->name('barang.ubah');
Route::post('/tambah-barang-koperasi/store', [barangController::class, 'store'])->name('formbarang.store');
Route::get('/barang/delete/{id}', [barangController::class, 'delete'])->name('barang.hapus');

Route::get('/validasipesanan', [pesananController::class, 'index']);
Route::get('/kelolapulsa', [pulsaController::class, 'index']);
Route::get('/validasipulsa', [pulsaController::class, 'validasiindex']);
});

//kelola ruangan
Route::get('/kelolaruangan', [ruanganController::class, 'kelolaruangan']);
Route::get('/tambahruangan', [ruanganController::class, 'tambahruangan']);
Route::post('/tambahruangan/store', [ruanganController::class, 'store'])->name('ruangan.store');
Route::post('/editruangan/{id}', [ruanganController::class, 'update'])->name('ruangan.ubah');
Route::get('/editruangan/{id}', [ruanganController::class, 'edit']);
Route::get('/ruangan/delete/{id}', [ruanganController::class, 'delete'])->name('ruangan.hapus');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
