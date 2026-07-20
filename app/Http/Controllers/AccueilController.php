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
                'route' =>'/'
            ],
            [
                'nom' => 'Médecin',
                'description' => 'Gérer mon planning et mes patients',
                'route' => '/'
            ],
            [
                'nom' => 'Secrétaire',
                'description' => 'Accueil, paiements, rappels et admissions',
                'route' => '/'
            ],
            [
                'nom' => 'Administrateur',
                'description' => 'Gestion des utilisateurs et statistiques',
                'route' => '/'
            ],
            
        ];

        return view('welcome', compact('profils'));
    }
}
