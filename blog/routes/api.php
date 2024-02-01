<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MateriController;
use App\Http\Controllers\Api\LatsolController;
use App\Http\Controllers\Api\NilaiController;
use App\Http\Controllers\Api\ProfilController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('loginSiswa', [AuthController::class, 'loginSiswa']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // PROFIL 
    Route::get('profil', [ProfilController::class, 'profil']);
    Route::put('update/{ni}', [ProfilController::class, 'update']);
    // UPDATE PASSWORD 
    Route::put('updatePassword', [AuthController::class, 'ubahPassword']);
    // CRUD MATERI
    Route::get('daftarmateri', [MateriController::class, 'index']);
    Route::get('showmateri/{id}', [MateriController::class, 'show']);
    //CRUD LATSOL
    Route::get('daftarlatsol', [LatsolController::class, 'index']);
    // LOGOUT
    Route::post('logout', [AuthController::class, 'logout']);
});
