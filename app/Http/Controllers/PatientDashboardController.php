<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\Consultation;
use App\Models\Traitement;
use Illuminate\Support\Facades\Auth;

class PatientDashboardController extends Controller
{
    public function index()
    {
        // Patient correspondant à l'utilisateur connecté
        $patient = Patient::where('user_id', Auth::id())->first();

        // Vérifier que le patient existe
        abort_if(!$patient, 404, 'Patient introuvable.');

        // Nombre de rendez-vous à venir
        $rdv = RendezVous::where('patient_id', $patient->id)
            ->whereDate('date', '>=', now()->toDateString())
            ->whereIn('statut', ['Programmé', 'Confirmé'])
            ->count();

        // Nombre de consultations du patient
        $consultations = Consultation::whereHas('rendezVous', function ($query) use ($patient) {
            $query->where('patient_id', $patient->id);
        })->count();

        // Nombre de traitements du patient
        $traitements = Traitement::whereHas('consultation.rendezVous', function ($query) use ($patient) {
            $query->where('patient_id', $patient->id);
        })->count();

        // Nombre de médecins suivis
        $medecins = RendezVous::where('patient_id', $patient->id)
            ->distinct()
            ->count('medecin_id');

        // Prochain rendez-vous
        $prochainRdv = RendezVous::with('medecin.user')
            ->where('patient_id', $patient->id)
            ->whereDate('date', '>=', now()->toDateString())
            ->whereIn('statut', ['Programmé', 'Confirmé'])
            ->orderBy('date')
            ->orderBy('heure')
            ->first();

        return view('patient.dashboard', compact(
            'patient',
            'rdv',
            'consultations',
            'traitements',
            'medecins',
            'prochainRdv'
        ));
    }
}