<?php

use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
Route::get('/', [AccueilController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/secretaire', function () { 
    return view('secretaire', ['user' => auth()->user()]); 
})->name('secretaire');
route::get('/patientcompte', function () { 
    return view('patientcompte', ['user' => auth()->user()]); 
})->name('patientcompte');
Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
    ->name('patient.dashboard');
