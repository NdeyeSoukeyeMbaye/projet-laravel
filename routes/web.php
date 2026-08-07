<?php

use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
Route::get('/', [AccueilController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
    ->name('patient.dashboard');