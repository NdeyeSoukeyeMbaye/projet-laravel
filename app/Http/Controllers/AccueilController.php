<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $profils = [
            [
                'nom' => 'Patient',
                'description' => 'Consulter mes rendez-vous et mon dossier médical',
                'route' => route('login', ['role' => 'patient'])
            ],
            [
                'nom' => 'Médecin',
                'description' => 'Gérer mon planning et mes patients',
                'route' => route('login', ['role' => 'medecin'])
            ],
            [
                'nom' => 'Secrétaire',
                'description' => 'Accueil, paiements, rappels et gestion',
                'route' => route('login', ['role' => 'secretaire'])
            ],
            [
                'nom' => 'Administrateur',
                'description' => 'Gestion des utilisateurs et statistiques',
                'route' => route('login', ['role' => 'medecin_chef'])
            ],
        ];

        return view('welcome', compact('profils')); 
    }
}
