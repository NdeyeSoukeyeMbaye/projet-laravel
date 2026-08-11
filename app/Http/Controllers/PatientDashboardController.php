<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\Consultation;
use App\Models\Traitement;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;

class PatientDashboardController extends Controller
{
    public function index()
    {
        // Pour l'instant on récupère le premier patient
        // Plus tard on utilisera le patient connecté
        $patient = Patient::first();

        $rdv = RendezVous::where('patient_id', $patient->id)->count();

        $consultations = Consultation::whereHas('rendezVous', function ($query) use ($patient) {
            $query->where('patient_id', $patient->id);
        })->count();

        $traitements = Traitement::count();

        $medecins = Medecin::count();

        return view('patient.dashboard', compact(
            'patient',
            'rdv',
            'consultations',
            'traitements',
            'medecins'
        ));
    }
}