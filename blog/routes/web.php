<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\LatsolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
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

//BAGIAN WELCOME
Route::get('/', function () {
    return view('welcome');
});

//BAGIAN LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

Route::middleware(['auth'])->group(function () {
    //BAGIAN HOME atau REPORT
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/generate-user-pdf/{role}', [ReportController::class, 'generateUserListPDF'])->name('generateUserListPDF');

    // BAGIAN PROFIL
    Route::get('/profil', [ProfilController::class, 'profil'])->name('viewProfil');
    Route::get('/edit', [ProfilController::class, 'edit'])->name('edit');
    Route::put('/update', [ProfilController::class, 'update'])->name('update');
    Route::delete('/delete-image', [ProfilController::class, 'deleteImage'])->name('deleteImage');
    Route::get('/password', [AuthController::class, 'updatePass'])->name('pass');
    Route::put('/ubah-password', [AuthController::class, 'ubahPassword'])->name('password');
    // BAGIAN MATERI
    Route::resource('materi', MateriController::class);
    Route::get('materi/{id}', [MateriController::class, 'show'])->name('materi.show');
    Route::get('materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::put('materi/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
    // BAGIAN LATSOL
    Route::get('/latsol', [LatsolController::class, 'latsol'])->name('latsol');
    Route::get('/tambahLatsol', [LatsolController::class, 'tambahLatsol'])->name('indexLatsol');
    Route::post('/tambahLatsol', [LatsolController::class, 'create'])->name('tambahLatsol');
    Route::get('/showLatsol/{id_latihan}', [LatsolController::class, 'show'])->name('showLatsol');
    Route::get('/editLatsol/{id_latihan}', [LatsolController::class, 'edit'])->name('editLatsol');
    Route::put('/editLatsol/{id_latihan}', [LatsolController::class, 'update'])->name('updateLatsol');
    Route::delete('/hapusLatsol/{id_latihan}', [LatsolController::class, 'destroy'])->name('hapusLatsol');
    // BAGIAN USER
    Route::resource('user', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{ni}', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/{ni}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{ni}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{ni}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    // BAGIAN LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
