<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\PetugasController;

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
    return view('login');
});

Route::get('/login',[LoginController::class,'login']);
Route::post('/login',[LoginController::class,'authanticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/register',[LoginController::class, 'register']);
Route::post('/register',[LoginController::class, 'store']);

Route::get('/masyarakat',[PengaduanController::class, 'index']);
Route::post('/masyarakat',[PengaduanController::class, 'store']);
Route::get('/admin', [PengaduanController::class, 'show']);
Route::get('/petugas',[PengaduanController::class, 'show']);
Route::get('/cetak',[PengaduanController::class, 'cetak']);
Route::get('/detail/{id}',[PengaduanController::class, 'detail']);
Route::post('/detail/{id}',[PengaduanController::class, 'validasi']);

Route::get('/daftarTanggapan',[TanggapanController::class, 'index']);
Route::get('/tanggapan/{id_tanggapan}',[TanggapanController::class ,'show']);
Route::post('/tanggapan/{id_tanggapan}',[TanggapanController::class, 'tanggapi']);

Route::get('/tambahPetugas',[PetugasController::class, 'index']);
Route::get('/tambah',[PetugasController::class, 'tambah']);
Route::post('/tambah',[PetugasController::class, 'store']);
Route::get('/edit/{id_petugas}',[PetugasController::class, 'edit']);
Route::post('/edit/{id_petugas}',[PetugasController::class, 'update']);
Route::get('/hapus/{id_petugas}',[PetugasController::class, 'delete']);
