<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\PerusahaanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('perusahaan',[PerusahaanController::class, 'index']);
Route::get('edit-perusahaan',[PerusahaanController::class, 'edit']);
Route::post('update-perusahaan',[PerusahaanController::class, 'update']);
Route::get('cabang',[CabangController::class,'index'])->name('cabangIndex');
Route::get('tambah-cabang',[CabangController::class,'create'])->name('tambahCabang');
Route::post('simpan',[CabangController::class,'store'])->name('simpanCabang');
Route::get('edit-cabang/{id}',[CabangController::class,'edit']);
Route::post('hapus-cabang',[CabangController::class,'destroy']);
Route::post('update-cabang/{id}',[CabangController::class,'update'])->name('simpanEditCabang');
Route::get('barang',[BarangController::class,'index']);
Route::get('create-barang',[BarangController::class,'create']);
Route::post('simpan-barang',[BarangController::class,'store']);
Route::get('edit-barang/{id}',[BarangController::class,'edit']);
Route::post('update-barang/{id}',[BarangController::class,'update']);
Route::post('hapus-barang',[BarangController::class,'destroy']);


Route::get('/clear-cache', function () {



    $exitCode = Artisan::call('cache:clear');



    $exitCode = Artisan::call('config:cache');



    \Artisan::call('route:clear');



    return 'DONE'; //Return anything



});