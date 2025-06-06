<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TPKController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\BadutaController;
use App\Http\Controllers\BumilController;
use App\Http\Controllers\CatinController;
use App\Http\Controllers\PasperController;
use App\Http\Controllers\AuthController;
// use Illuminate\Support\Facades\Route;

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.process');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// // Admin routes
// Route::middleware(['auth:web'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard');
//     });
// });
// // TPK routes
// Route::middleware(['auth:tpk'])->group(function () {
//     Route::get('/tpk/dashboard', function () {
//         return view('tpk.dashboard');
//     });
// });

//TPK
Route::get('/tpk', [TPKController::class, 'index'])->name('tpk.index');
Route::get('/tpk/create', [TPKController::class, 'create'])->name('tpk.create');
Route::post('/tpk', [TPKController::class, 'store'])->name('tpk.store');
Route::get('/tpk/{tpk}/edit', [TPKController::class, 'edit'])->name('tpk.edit');
Route::put('/tpk/{tpk}', [TPKController::class, 'update'])->name('tpk.update');
Route::delete('/tpk/{tpk}', [TPKController::class, 'destroy'])->name('tpk.destroy');

//Data Penduduk
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
Route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
Route::get('/penduduk/{penduduk}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
Route::put('/penduduk/{penduduk}', [PendudukController::class, 'update'])->name('penduduk.update');
Route::delete('/penduduk/{penduduk}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');

// Form Baduta
Route::get('/baduta/create/{penduduk_id}', [BadutaController::class, 'create'])->name('baduta.create');
Route::post('/baduta', [BadutaController::class, 'store'])->name('baduta.store');
// Form Bumil
Route::get('/bumil/create/{penduduk_id}', [BumilController::class, 'create'])->name('bumil.create');
Route::post('/bumil', [BumilController::class, 'store'])->name('bumil.store');
// Form Catin
Route::get('/catin/create/{penduduk_id}', [CatinController::class, 'create'])->name('catin.create');
Route::post('/catin', [CatinController::class, 'store'])->name('catin.store');
// Form Pasca Persalinan
Route::get('/pasper/create/{penduduk_id}', [PasperController::class, 'create'])->name('pasper.create');
Route::post('/pasper', [PasperController::class, 'store'])->name('pasper.store');