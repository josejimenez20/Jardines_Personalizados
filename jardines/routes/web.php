<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pantalla_inicioController;
use App\Http\Controllers\Mi_perfilController;
use App\Http\Controllers\Recomen;
use App\Http\Controllers\Resultados;
use App\Http\Controllers\Sobre;

Route::get('/login', [LoginController::class, 'showLogin'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.custom');
Route::post('/register', [LoginController::class, 'register'])->name('register.custom');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/Pantalla_inicio', [Pantalla_inicioController::class, 'Pantalla_inicio'])->name('pantalla_inicio');
Route::get('/recomen', [Recomen::class, 'recomen'])->name('recomen');
Route::get('/resultados', [Resultados::class, 'resultados'])->name('resultados');
Route::get('/sobre', [Sobre::class, 'sobre'])->name('sobre');
Route::get('/detalles_plantas', [Sobre::class, 'detalles'])->name('detalles_plantas');



Route::get('/mi_perfil', [Mi_perfilController::class, 'Mi_perfil'])->name('mi_perfil');
Route::post('/mi_perfil/update-password', [Mi_perfilController::class, 'updatePassword'])->name('perfil.updatePassword');
Route::post('/mi_perfil/update-email', [Mi_perfilController::class, 'updateEmail'])->name('perfil.updateEmail');
Route::post('/mi_perfil/delete-account', [Mi_perfilController::class, 'deleteAccount'])->name('perfil.deleteAccount');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


