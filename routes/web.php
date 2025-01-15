<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\LaporanController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard',[
    "title"=>"Dashboard"
    ]);
   })->middleware('auth');

Route::resource('penitipan',PenitipanController::class)->middleware('auth');
Route::resource('user',UserController::class)->except('destroy','create','show','update','edit')->middleware('auth');
Route::resource('produk', ProdukController::class)->middleware('auth');
Route::resource('hutang', HutangController::class)->middleware('auth');
Route::get('cetakReceipt',[CetakController::class,'receipt'])->name('cetakReceipt')->middleware('auth');
Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware('auth');


Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout']);

Route::get('penjualan',function(){
    return view('penjualan.index',[
        "title"=>"Penjualan"
    ]);
})->name('penjualan')->middleware('auth');

Route::get('transaksi',function(){
    return view('penjualan.transaksis',[
        "title"=>"Transaksi"
    ]);
})->middleware('auth');