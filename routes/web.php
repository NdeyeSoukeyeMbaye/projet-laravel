<?php

use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccueilController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/secretaire', function () { 
    return view('secretaire', ['user' => auth()->user()]); 
})->name('secretaire');
Route::get('/patientcompte', function () { 
    return view('patientcompte', ['user' => auth()->user()]); 
})->name('patientcompte');
Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
    ->name('patient.dashboard');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/admin/utilisateurs', [UtilisateurController::class, 'index'])
    ->name('admin.utilisateurs');
Route::get('/admin/utilisateurs/create', [UtilisateurController::class, 'create'])
    ->name('admin.utilisateurs.create');

Route::post('/admin/utilisateurs', [UtilisateurController::class, 'store'])
    ->name('admin.utilisateurs.store');