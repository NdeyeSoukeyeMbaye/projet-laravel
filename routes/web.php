<?php

use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PatientCompteController;

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
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');


Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');

// Modifier un RDV
Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update');

// Actions rapides : Validation arrivée et Annulation
Route::patch('/agenda/{id}/valider', [AgendaController::class, 'validerArrivee'])->name('agenda.valider');
Route::patch('/agenda/{id}/annuler', [AgendaController::class, 'annulerRdv'])->name('agenda.annuler');// Gestion des Comptes et Fiches Patients
Route::get('/patientcompte', [PatientCompteController::class, 'index'])->name('patientcompte.index');
Route::post('/patientcompte', [PatientCompteController::class, 'store'])->name('patientcompte.store');
Route::put('/patientcompte/{id}', [PatientCompteController::class, 'update'])->name('patientcompte.update');