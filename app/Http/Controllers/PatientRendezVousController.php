<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Auth;

class PatientRendezVousController extends Controller
{
    public function index()
    {
        // Patient connecté
        $patient = Patient::where('user_id', Auth::id())->first();

        abort_if(!$patient, 404, 'Patient introuvable.');


        // Rendez-vous à venir
        $rendezVousAVenir = RendezVous::with([
                'medecin.user',
                'medecin.specialite'
            ])
            ->where('patient_id', $patient->id)
            ->whereDate('date', '>=', now()->toDateString())
            ->whereIn('statut', ['Programmé', 'Confirmé'])
            ->orderBy('date')
            ->orderBy('heure')
            ->get();


        // Rendez-vous passés
        $rendezVousPasses = RendezVous::with([
                'medecin.user',
                'medecin.specialite'
            ])
            ->where('patient_id', $patient->id)
            ->where(function ($query) {
                $query->whereDate('date', '<', now()->toDateString())
                      ->orWhereIn('statut', ['Terminé', 'Annulé']);
            })
            ->orderByDesc('date')
            ->orderByDesc('heure')
            ->get();


        return view('patient.rendez-vous', compact(
            'patient',
            'rendezVousAVenir',
            'rendezVousPasses'
        ));
    }
}