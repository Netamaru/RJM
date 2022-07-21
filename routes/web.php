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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kriteria', [KriteriaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/input-kayu', [KayuController::class, 'index'])->middleware('auth');
Route::get('/dashboard/input-bobot', [BobotController::class, 'index'])->middleware('auth');
Route::get('/dashboard/perhitungan', [DashboardController::class, 'perhitungan'])->middleware('auth');
