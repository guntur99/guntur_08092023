<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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
    return view('welcome');
});

Route::get('pegawai' [PegawaiController::class, 'index'])->name('index.pegawai');
Route::get('pegawai/create', [PegawaiController::class, 'create'])->name('create.pegawai');
Route::post('pegawai/store', [PegawaiController::class, 'store'])->name('store.pegawai');
