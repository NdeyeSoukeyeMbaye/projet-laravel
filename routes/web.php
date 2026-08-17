<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\PatientRendezVousController;
use App\Http\Controllers\PatientDossierMedicalController;
use App\Http\Controllers\PatientHistoriqueController;
/*
|--------------------------------------------------------------------------
| Page d'accueil
|--------------------------------------------------------------------------
*/

Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');


/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| Déconnexion
|--------------------------------------------------------------------------
*/

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');


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


Route::get('/patientcompte', function () {
    return view('patientcompte', [
        'user' => auth()->user()
    ]);
})->name('patientcompte');


/*
|--------------------------------------------------------------------------
| Espace Patient
|--------------------------------------------------------------------------
*/

Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
    ->name('patient.dashboard');


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