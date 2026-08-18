<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();

        return view('admin.utilisateurs', compact('utilisateurs'));
    }

    public function create()
    {
        return view('admin.ajouter-utilisateur');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:20',
            'email' => 'required|email|max:30unique:utilisateur,email',
            'mot_de_passe' => 'required|string|max:30',
            'role' => 'required|string|max:50',

        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => bcrypt($request->mot_de_passe),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.utilisateurs')
            ->with('success', 'Utilisateur ajouté avec succès.');
    }
}