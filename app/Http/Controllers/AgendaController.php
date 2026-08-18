<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientCompteController extends Controller
{
    /**
     * Liste des patients avec recherche sur la table jointe des utilisateurs.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // On cherche dans la table patients ET dans la table users reliée
        $patients = Patient::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('telephone', 'LIKE', "%{$search}%")
                             ->orWhere('adresse', 'LIKE', "%{$search}%")
                             ->orWhereHas('user', function ($uQuery) use ($search) {
                                 $uQuery->where('name', 'LIKE', "%{$search}%")
                                        ->orWhere('email', 'LIKE', "%{$search}%");
                             });
            })->get();

        $patient = $patients->first();

        return view('patientcompte', compact('patients', 'patient'));
    }

    /**
     * Création simultanée du User et du Patient.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'telephone'      => 'required|string|max:20',
            'adresse'        => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'sexe'           => 'nullable|in:Masculin,Feminin',
        ]);

        // 1. Création de l'utilisateur de base
        $user = User::create([
            'name'     => $validated['prenom'] . ' ' . $validated['nom'],
            'email'    => $validated['email'],
            'password' => Hash::make(Str::random(12)), // Mot de passe aléatoire sécurisé
        ]);

        // 2. Création de la fiche patient reliée
        Patient::create([
            'user_id'        => $user->id,
            'telephone'      => $validated['telephone'],
            'adresse'        => $validated['adresse'],
            'date_naissance' => $validated['date_naissance'],
            'sexe'           => $validated['sexe'],
        ]);

        return redirect()->route('patientcompte.index')->with('success', 'Fiche patient et compte utilisateur créés avec succès.');
    }
}
