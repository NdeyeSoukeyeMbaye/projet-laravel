<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class PatientDossierMedicalController extends Controller
{
    public function index()
    {
        // Récupérer le patient connecté
        $patient = Patient::where('user_id', Auth::id())->first();

        // Vérifier que le patient existe
        abort_if(!$patient, 404, 'Patient introuvable.');

        // Récupérer les dossiers médicaux du patient
        $dossiers = $patient->dossiersMedicaux()
            ->latest('date_consultation')
            ->get();

        return view('patient.dossier-medical', compact(
            'patient',
            'dossiers'
        ));
    }
}