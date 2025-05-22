<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\JuandaController;
use App\Http\Controllers\MyaminController;
use App\Http\Controllers\CendanaController;
use App\Http\Controllers\MsaidController;
use App\Http\Controllers\LpjuandaController;
use App\Http\Controllers\LpcendanaController;
use App\Http\Controllers\LpmyaminController;
use App\Http\Controllers\LpmsaidController;

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
Route::get('/', [AuthController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

//Data User
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update{id}', [UserController::class, 'update']);
Route::get('/user/destroy{id}', [UserController::class, 'destroy']);

//Data Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::post('/kategori/update{id}', [KategoriController::class, 'update']);
Route::get('/kategori/destroy{id}', [KategoriController::class, 'destroy']);


//Data Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/update{id}', [BarangController::class, 'update']);
Route::get('/barang/destroy{id}', [BarangController::class, 'destroy']);

// Data Barang Masuk
Route::get('/barangmasuk', [BarangMasukController::class, 'index']);
Route::get('/barangmasuk/create', [BarangMasukController::class, 'create']);
Route::post('/barangmasuk/store', [BarangMasukController::class, 'store']);

// Data Barang KEluar
Route::get('/barangkeluar', [BarangKeluarController::class, 'index']);
Route::get('/barangkeluar/create', [BarangKeluarController::class, 'create']);
Route::post('/barangkeluar/store', [BarangKeluarController::class, 'store']);

//Data Laporan 
Route::get('/lapbarangmasuk', [LaporanController::class, 'lapbarangmasuk']);
Route::post('/lapbarangmasuk/cetakmasuk', [LaporanController::class, 'cetakmasuk']);

Route::get('/lapbarangkeluar', [LaporanController::class, 'lapbarangkeluar']);
Route::post('/lapbarangkeluar/cetakkeluar', [LaporanController::class, 'cetakkeluar']);

Route::get('/outlet', [OutletController::class, 'index']);
Route::post('/outlet/store', [OutletController::class, 'store']);
Route::post('/outlet/update{id}', [OutletController::class, 'update']);
Route::get('/outlet/destroy{id}', [OutletController::class, 'destroy']);

// Data Barang Keluar Juanda
Route::get('/juanda', [JuandaController::class, 'index']);
Route::get('/juanda/create', [JuandaController::class, 'create']);
Route::post('/juanda/store', [JuandaController::class, 'store']);

// Data Barang Keluar Myamin
// Route::get('/myamin', [MyaminController::class, 'index']);
// Route::get('/myamin/create', [MyaminController::class, 'create']);
// Route::post('/myamin/store', [MyaminController::class, 'store']);

// // Data Barang Keluar cendana
// Route::get('/cendana', [CendanaController::class, 'index']);
// Route::get('/cendana/create', [CendanaController::class, 'create']);
// Route::post('/cendana/store', [CendanaController::class, 'store']);
// // Data Barang Keluar cendana
// Route::get('/msaid', [MsaidController::class, 'index']);
// Route::get('/msaid/create', [MsaidController::class, 'create']);
// Route::post('/msaid/store', [MsaidController::class, 'store']);

//laporan Barang Keluar juanda
Route::get('/lapbarangkeluarjuanda', [LpjuandaController::class, 'lapbarangkeluarjuanda']);
Route::post('/lapbarangkeluarjuanda/cetakkeluarjuanda', [LpjuandaController::class, 'cetakkeluarjuanda']);

// //laporan Barang Keluar cendana
// Route::get('/lapbarangkeluarcendana', [LpcendanaController::class, 'lapbarangkeluarcendana']);
// Route::post('/lapbarangkeluarcendana/cetakkeluarcendana', [LpcendanaController::class, 'cetakkeluarcendana']);

// //laporan Barang Keluar myamin
// Route::get('/lapbarangkeluarmyamin', [LpmyaminController::class, 'lapbarangkeluarmyamin']);
// Route::post('/lapbarangkeluarmyamin/cetakkeluarmyamin', [LpmyaminController::class, 'cetakkeluarmyamin']);

// //laporan Barang Keluar msid
// Route::get('/lapbarangkeluarmsaid', [LpmsaidController::class, 'lapbarangkeluarmsaid']);
// Route::post('/lapbarangkeluarmsaid/cetakkeluarmsaid', [LpmsaidController::class, 'cetakkeluarmsaid']);


    

 

