<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PatientCompteController;
use App\Http\Controllers\AuthController;

// 🔥 CES LIGNES AJOUTÉES VONT ENLEVER TOUS LES TRAITS ROUGES :
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\PatientRendezVousController;
use App\Http\Controllers\PatientDossierMedicalController;
use App\Http\Controllers\PatientHistoriqueController;

Route::get('/', [AccueilController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Déconnexion
|--------------------------------------------------------------------------
*/
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Pages diverses
|--------------------------------------------------------------------------
*/
Route::get('/secretaire', function () {
    return view('secretaire', [
        'user' => auth()->user()
    ]);
})->name('secretaire');

/*
|--------------------------------------------------------------------------
| Espace Patient
|--------------------------------------------------------------------------
*/
Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
    ->name('patient.dashboard');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');

// Modifier un RDV
Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update');

// Actions rapides : Validation arrivée et Annulation
Route::patch('/agenda/{id}/valider', [AgendaController::class, 'validerArrivee'])->name('agenda.valider');
Route::patch('/agenda/{id}/annuler', [AgendaController::class, 'annulerRdv'])->name('agenda.annuler');

// Gestion des Comptes et Fiches Patients
Route::get('/patientcompte', [PatientCompteController::class, 'index'])->name('patientcompte.index');
Route::post('/patientcompte', [PatientCompteController::class, 'store'])->name('patientcompte.store');
Route::put('/patientcompte/{id}', [PatientCompteController::class, 'update'])->name('patientcompte.update');

/*
|--------------------------------------------------------------------------
| Rendez-vous du patient
|--------------------------------------------------------------------------
*/
Route::get('/patient/rendez-vous', [PatientRendezVousController::class, 'index'])
    ->name('patient.rendez-vous');

/*
|--------------------------------------------------------------------------
| Dossiers médicaux du patient
|--------------------------------------------------------------------------
*/
Route::get('/patient/dossier-medical', [PatientDossierMedicalController::class, 'index'])
    ->name('patient.dossier-medical');

/*
|--------------------------------------------------------------------------
| Historique des consultations et rendez-vous du patient
|--------------------------------------------------------------------------
*/
Route::get('/patient/historique', [PatientHistoriqueController::class, 'index'])
    ->name('patient.historique');