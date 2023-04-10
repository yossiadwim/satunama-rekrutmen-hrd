<?php


use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\KelolaKandidatController;
// use App\Http\Controllers\CreateLowonganController;
use App\Http\Controllers\DetailLowonganController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanKerjaController;

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
Route::post('/profil/{profil:id}/description',[ProfilController::class,'description']);
// Route::post('/profil/{profil:id}/work-experience',[ProfilController::class,'work_experience']);
Route::resource('/profil',ProfilController::class);

// Route::post('/pengalamanKerja/store',[PengalamanKerjaController::class,'store']);

Route::get('/lamaran_saya',[LamaranController::class, 'index']);
Route::get('/pengaturan',[PengaturanController::class, 'index']);

Route::get('/detail-lowongan/{job:slug}',[DetailLowonganController::class, 'show']);

Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/admin-dashboard/jobs/{job:slug}/closeJobs', [AdminDashboardController::class, 'closeJobs']);


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('/admin-dashboard/createSlug', [AdminDashboardController::class, 'checkSlug']);
Route::get('/admin-kelola-kandidat/{job:slug}', [KelolaKandidatController::class, 'show']);

Route::resource('/admin-dashboard/jobs', AdminDashboardController::class);
Route::resource('/pengalamanKerja', PengalamanKerjaController::class);
Route::resource('/pendidikan', PendidikanController::class);
Route::resource('/dokumen', DokumenController::class);
Route::resource('/kandidat', PelamarController::class);


?>