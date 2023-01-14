<?php

use App\Http\Controllers\BerandaController;
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



Route::get('/prodi-index', [ProdiController::class, 'index']);
Route::get('/prodi-createIndex', [ProdiController::class, 'createIndex']);
Route::post('/prodi-create', [ProdiController::class, 'create']);
Route::get('/prodi-delete/{id}', [ProdiController::class, 'delete']);
