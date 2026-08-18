<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientCompteController extends Controller
{
    /**
     * Afficher la liste des patients filtrée et charger la fiche active.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filtrage dynamique selon la saisie de la secrétaire
        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('nom', 'LIKE', "%{$search}%")
                         ->orWhere('prenom', 'LIKE', "%{$search}%")
                         ->orWhere('telephone', 'LIKE', "%{$search}%");
        })->orderBy('nom', 'asc')->get();

        // Récupération automatique du premier patient trouvé pour alimenter la modification
        $patient = $patients->first();

        return view('patientcompte', compact('patients', 'patient'));
    }

    /**
     * Enregistrer une nouvelle fiche patient (Création).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'       => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'poids'     => 'nullable|numeric|min:0',
            'taille'    => 'nullable|integer|min:0',
            'statut'    => 'required|in:actif,archive,suspendu',
        ]);

       // On ajoute l'ID de l'utilisateur connecté dans les données validées
        $validated['user_id'] = auth()->id();
        $validated['adresse'] = 'non specifiee';

        // On crée le patient avec toutes les données (y compris le user_id)
        Patient::create($validated);
        return redirect()->back()->with('success', 'Profil patient créé avec succès.');
    }

    /**
     * Mettre à jour les constantes d'une fiche existante (Modification).
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validated = $request->validate([
            'telephone' => 'required|string|max:20',
            'poids'     => 'nullable|numeric|min:0',
            'taille'    => 'nullable|integer|min:0',
            'statut'    => 'required|in:actif,archive,suspendu',
            
        ]);

        $patient->update($validated);

        return redirect()->route('patientcompte.index')->with('success', 'Fiche patient mise à jour avec succès.');
    }
}
