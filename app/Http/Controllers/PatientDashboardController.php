<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\Consultation;
use App\Models\Traitement;
use Medecin;
use Illuminate\Support\Facades\Auth;

class PatientDashboardController extends Controller
{
    public function index()
    {
        // Patient correspondant à l'utilisateur connecté
        $patient = Patient::where('user_id', Auth::id())->first();

        // Vérifier que le patient existe
        abort_if(!$patient, 404, 'Patient introuvable.');

        // ==============================
        // STATISTIQUES
        // ==============================

        // Rendez-vous à venir
        $rdv = RendezVous::where('patient_id', $patient->id)
            ->whereDate('date', '>=', now()->toDateString())
            ->whereIn('statut', ['Programmé', 'Confirmé'])
            ->count();

        // Consultations réalisées
        $consultations = Consultation::whereHas('rendezVous', function ($query) use ($patient) {
            $query->where('patient_id', $patient->id);
        })->count();

        // Traitements du patient
        $traitements = Traitement::whereHas('consultation.rendezVous', function ($query) use ($patient) {
            $query->where('patient_id', $patient->id);
        })->count();

        // Médecins suivis
        $medecins = RendezVous::where('patient_id', $patient->id)
            ->distinct()
            ->count('medecin_id');


        // ==============================
        // PROCHAIN RENDEZ-VOUS
        // ==============================

        $prochainRdv = RendezVous::with([
                'medecin.user',
                'medecin.specialite'
            ])
            ->where('patient_id', $patient->id)
            ->whereDate('date', '>=', now()->toDateString())
            ->whereIn('statut', ['Programmé', 'Confirmé'])
            ->orderBy('date')
            ->orderBy('heure')
            ->first();


        // ==============================
        // DERNIÈRES CONSULTATIONS
        // ==============================

        $dernieresConsultations = Consultation::with([
                'rendezVous.medecin.user',
                'rendezVous.medecin.specialite'
            ])
            ->whereHas('rendezVous', function ($query) use ($patient) {
                $query->where('patient_id', $patient->id);
            })
            ->orderByDesc('date_consultation')
            ->take(5)
            ->get();


        // ==============================
        // TRAITEMENTS
        // ==============================

        $traitementsEnCours = Traitement::with([
                'consultation.rendezVous.medecin.user',
                'consultation.rendezVous.medecin.specialite'
            ])
            ->whereHas('consultation.rendezVous', function ($query) use ($patient) {
                $query->where('patient_id', $patient->id);
            })
            ->latest()
            ->take(5)
            ->get();


        return view('patient.dashboard', compact(
            'patient',
            'rdv',
            'consultations',
            'traitements',
            'medecins',
            'prochainRdv',
            'dernieresConsultations',
            'traitementsEnCours'
        ));
    }
}