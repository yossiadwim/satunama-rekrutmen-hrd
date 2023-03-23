<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\KelolaKandidatController;
// use App\Http\Controllers\CreateLowonganController;
use App\Http\Controllers\DetailLowonganController;


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

// Route::get('/buat-lowongan',[CreateLowonganController::class,'index']);

Route::get('/main',[MainController::class, 'index']);
Route::get('/profil/fetch_kabupaten',[ProfilController::class,'fetch_kabupaten']);
Route::resource('/profil',ProfilController::class);

Route::get('/lamaran_saya',[LamaranController::class, 'index']);
Route::get('/pengaturan',[PengaturanController::class, 'index']);



Route::get('/detail-lowongan/{job:slug}',[DetailLowonganController::class, 'show']);

Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


// Route::get('/admin-dashboard', function(){
//     return view('main.index_admin');
// });

Route::get('/admin-dashboard/createSlug', [AdminDashboardController::class, 'checkSlug']);
Route::get('/admin-kelola-kandidat/{job:slug}', [KelolaKandidatController::class, 'show']);

Route::resource('/admin-dashboard', AdminDashboardController::class);


?>