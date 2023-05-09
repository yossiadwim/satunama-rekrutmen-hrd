<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PengalamanKerjaController;

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

Route::get('/lowongan-kerja',[LowonganKerjaController::class,'index']);
Route::post('/lowongan-kerja/{lowongan}',[LowonganKerjaController::class,'upload']);
Route::get('/lowongan-kerja/{lowongan:slug}/detail',[LowonganKerjaController::class,'show']);

Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/login',[LoginController::class, 'index']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/createSlug',[RegisterController::class, 'checkSlug']);

// Route::get('/profil-kandidat/{users:slug}',[ProfilController::class,'show']);
Route::post('/profil-kandidat/users/{user:slug}/description',[ProfilController::class,'description']);
Route::resource('/profil-kandidat/users',ProfilController::class);

Route::resource('/pengalamanKerja',PengalamanKerjaController::class);
Route::resource('/pendidikan', PendidikanController::class);

Route::get('/admin-dashboard/lowongan/createSlug',[AdminDashboardController::class, 'checkSlug']);
Route::post('/admin-dashboard/lowongan/{lowongan:slug}/closeJobs', [AdminDashboardController::class, 'closeJobs']);
Route::get('/admin-dashboard/lowongan/{lowongan:slug}/kelola-kandidat', [AdminDashboardController::class, 'show']);
Route::post('/admin-dashboard/lowongan/{lowongan:slug}/changePosition', [AdminDashboardController::class, 'changePosition']);
Route::resource('/admin-dashboard/lowongan', AdminDashboardController::class);
