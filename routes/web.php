<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
Route::get('/auth/google/callback',[GoogleController::class, 'callback']);
Route::get('/auth/google',[GoogleController::class, 'redirectTogoogle']);

Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/user-ujian-view/{id}', [UserController::class, 'view']);
Route::get('/user-ujian-start/{id}', [UserController::class, 'start']);

Route::middleware(['auth','isAdmin'])->group(function() {
     Route::get('/ujian-index',[UjianController::class, 'index']);
     Route::get('/ujian-add',[UjianController::class, 'tampil_input']);
     Route::post('/ujian-add-real',[UjianController::class, 'input']);
     Route::get('/ujian-update/{id_ujian}',[UjianController::class, 'tampil_update']);
     Route::post('/ujian-update-real/{id_ujian}',[UjianController::class, 'update']);
     Route::get('/ujian-delete/{id_ujian}',[UjianController::class, 'destroy']);
     Route::get('/ujian-add-soal/{id_ujian}',[UjianController::class, 'tampilupdatesoal']);
     Route::post('/ujian-add-soal/{id_ujian}/{id_soal}',[UjianController::class, 'updatesoal']);
     Route::post('/ujian-delete-soal/{id_ujian}/{id_soal}',[UjianController::class, 'deletesoal']);
     Route::get('/ujian-view/{id_ujian}',[UjianController::class, 'view']);
     Route::get('/ujian-start/{id_ujian}',[UjianController::class, 'start_ujian']);


     Route::get('/subject-index',[SubjectController::class, 'index']);
     Route::get('/subject-add',[SubjectController::class, 'tampil_input']);
     Route::post('/subject-add-real',[SubjectController::class, 'input']);
     Route::get('/subject-update/{id_subject}',[SubjectController::class, 'tampil_update']);
     Route::post('/subject-update-real/{id_subject}',[SubjectController::class, 'update']);
     Route::get('/subject-delete/{id_subject}',[SubjectController::class, 'destroy']);

     Route::get('/soal-index',[SoalController::class, 'index']);
     Route::get('/soal-add',[SoalController::class, 'tampil_input']);
     Route::post('/soal-add-real',[SoalController::class, 'input']);
     Route::get('/soal-update/{id_soal}',[SoalController::class, 'tampil_update']);
     Route::post('/soal-update-real/{id_soal}',[SoalController::class, 'update']);
     Route::get('/soal-delete/{id_soal}',[SoalController::class, 'destroy']);
});
Route::middleware(['auth','guest'])->group(function() {
    Route::get('/', function () {
        return view('auth.login');
    });
});