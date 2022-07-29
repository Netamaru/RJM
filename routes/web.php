<?php

use App\Http\Controllers\BobotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KayuController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

// main
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kriteria', [KriteriaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/input-kayu', [KayuController::class, 'index'])->middleware('auth');
Route::get('/dashboard/input-bobot', [BobotController::class, 'index'])->middleware('auth');
Route::get('/dashboard/perhitungan', [DashboardController::class, 'perhitungan'])->middleware('auth');

// kriteria
route::resource('dashboard/kriteria', KriteriaController::class);
Route::get('dashboard/kriteria/delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.remove')->middleware('auth');
Route::get('dashboard/kriteria/update/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit')->middleware('auth');
Route::get('dashboard/kriteria/create/{param}', [KriteriaController::class, 'tambah'])->name('kriteria.tambah')->middleware('auth');

// bobot
route::resource('dashboard/input-bobot', BobotController::class);
Route::get('dashboard/input-bobot/delete/{id}', [BobotController::class, 'destroy'])->name('bobot.remove')->middleware('auth');
Route::get('dashboard/input-bobot/update/{id}', [BobotController::class, 'edit'])->name('bobot.edit')->middleware('auth');
Route::get('dashboard/input-bobot/create/', [BobotController::class, 'tambah'])->name('bobot.tambah')->middleware('auth');
