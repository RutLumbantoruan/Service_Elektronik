<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransaksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create somethin g great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('awal');
Auth::routes(['verify'=>true]);
Route::get('/', [HomeController::class, 'index'])->name('awal');
Route::get('/lihat/{serviceId}', [App\Http\Controllers\HomeController::class, 'show'])->name('lihat');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi_store');

Route::group(['middleware' => ['auth']], function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::get('/cetak-pdf', [ServiceController::class, 'cetak_pdf'])->name('cetak');
        Route::get('/export-excel', [ServiceController::class, 'export_excel'])->name('excel');
        Route::get('/searchLive', [TransaksiController::class, 'search'])->name('searchLive');
});

