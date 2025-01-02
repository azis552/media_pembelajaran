<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Kelas;
use App\Http\Controllers\Kuis;
use App\Http\Controllers\Modul;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('auth/login',[Auth::class,'login'])->name('login');
Route::get('auth/register',[Auth::class,'signUp'])->name('login.signup');
Route::post('auth/register',[Auth::class,'register'])->name('login.register');
Route::post('auth/login_check',[Auth::class,'login_check'])->name('login_check');

Route::middleware(['auth'])->group(function () {

Route::get('dashboard',[Dashboard::class,'index'])->name('dashboard');
Route::get('logout',[Auth::class,'logout'])->name('logout');
Route::resource('kelas',Kelas::class);
// kuis
Route::get('kelas/{id}/kelola',[Kelas::class,'kelola'])->name('kelas.kelola');
Route::get('kuis/',[Kelas::class,'index'])->name('kuis');
Route::POST('kelas/simpan_kelola',[Kelas::class,'simpan_kuis'])->name('kelas.kuis');
Route::PUT('kelas/kelola_kuis/{id}',[Kelas::class,'update_kuis'])->name('kuis.update');
Route::Delete('kelas/kelola/delete/{id}',[Kelas::class,'delete_kuis'])->name('kuis.delete');
// soal
Route::get('kelas/kelola/{id}/kuis_soal',[Kelas::class,'kuis_soal'])->name('kuis.soal');
Route::post('kelas/kuis/soal',[Kelas::class,'tambah_soal'])->name('soal.kuis');
Route::put('kelas/kuis/soal/{id}',[Kelas::class,'update_soal'])->name('soal.update');

// join kelas
Route::post('kelas/join',[Kelas::class,'join_kelas'])->name('kelas.join');


// play kuis
Route::get('history/kuis/{id}',[Kuis::class,'history_siswa'])->name('history.kuis.siswa');
Route::get('kuis/{id}/play',[Kuis::class,'play'])->name('play.kuis');
Route::post('kuis/play',[Kuis::class,'simpan_score'])->name('play.simpan');
Route::get('kuis/history',[Kuis::class,'history'])->name('kuis.history');
Route::post('kuis/store',[Kuis::class,'store'])->name('kuis.store');
Route::get('kuis/history/{id}/tgl/{id2}',[Kuis::class,'history_detail'])->name('kuis.history.detail');

// profile
Route::put('profile/update/{id}',[Auth::class,'update'])->name('update.profile');
Route::get('profile/{id}/user',[Auth::class,'profile'])->name('profile');

// Modul

Route::resource('modul',Modul::class);
    
});