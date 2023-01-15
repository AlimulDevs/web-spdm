<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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

Route::get('/', [BerandaController::class, 'index']);

Route::get('/loginIndex', [AuthController::class, 'loginIndex']);
Route::get('/registerIndex', [AuthController::class, 'registerIndex']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);



Route::get('/mahasiswa-detail/{id}', [MahasiswaController::class, 'detailIndex']);
Route::get('/mahasiswa-index', [MahasiswaController::class, 'index']);


Route::get('/angkatan-viewIndex/{prodi_id}/{angkatan_id}', [AngkatanController::class, 'viewIndex']);
Route::post('/angkatan-viewIndex/createMahasiswa', [AngkatanController::class, 'createMahasiswa']);
Route::post('/angkatan-viewIndex/editMahasiswa', [AngkatanController::class, 'editMahasiswa']);
Route::get('/angkatan-deleteMahasiswa/{id}', [AngkatanController::class, 'deleteMahasiswa']);
Route::get('/angkatan-index', [AngkatanController::class, 'index']);
Route::post('/angkatan-create', [AngkatanController::class, 'create']);
Route::post('/angkatan-edit', [AngkatanController::class, 'edit']);
Route::get('/angkatan-delete/{id}', [AngkatanController::class, 'delete']);


Route::get('/prodi-index', [ProdiController::class, 'index']);
Route::get('/prodi-byId/{id}', [ProdiController::class, 'prodiByID']);
Route::get('/prodi-createIndex', [ProdiController::class, 'createIndex']);
Route::get('/prodi-editIndex/{id}', [ProdiController::class, 'editIndex']);
Route::post('/prodi-create', [ProdiController::class, 'create']);
Route::post('/prodi-edit', [ProdiController::class, 'edit']);
Route::get('/prodi-delete/{id}', [ProdiController::class, 'delete']);
