<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Consultation;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Auth;

class PatientHistoriqueController extends Controller
{
    public function index()
    {
        // Patient connecté
        $patient = Patient::where('user_id', Auth::id())->first();

        abort_if(!$patient, 404, 'Patient introuvable.');

        /*
        |--------------------------------------------------------------------------
        | Historique des consultations
        |--------------------------------------------------------------------------
        */
        $consultations = Consultation::with([
                'rendezVous.medecin.user'
            ])
            ->whereHas('rendezVous', function ($query) use ($patient) {
                $query->where('patient_id', $patient->id);
            })
            ->orderByDesc('date_consultation')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Rendez-vous passés
        |--------------------------------------------------------------------------
        */
        $rendezVousPasses = RendezVous::with([
                'medecin.user',
                'medecin.specialite'
            ])
            ->where('patient_id', $patient->id)
            ->whereDate('date', '<', now()->toDateString())
            ->orderByDesc('date')
            ->orderByDesc('heure')
            ->get();

        return view('patient.historique', compact(
            'patient',
            'consultations',
            'rendezVousPasses'
        ));
    }
}