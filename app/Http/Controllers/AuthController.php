<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion en passant le rôle sélectionné.
     */
    public function showLoginForm(Request $request)
    {
        // Récupère le rôle depuis l'URL (ex: ?role=patient) pour l'envoyer à la vue
        $role = $request->query('role');
        
        return view('showLoginForm', compact('role'));
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('accueil');
    }
    /**
     * Gère la tentative d'authentification selon le rôle.
     */
    public function login(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string', 'in:medecin,secretaire,patient,medecin_chef,administrateur'],
            'email' => ['nullable', 'email'],
            'password' => ['nullable', 'string'],
            'matricule' => ['nullable', 'string'],
            'nom' => ['nullable', 'string'],
            'prenom' => ['nullable', 'string'],
            'code' => ['nullable', 'string'],
        ]);

        $role = $request->input('role');

        // --- AUTHENTIFICATION MÉDECIN / MÉDECIN CHEF ---
        if ($role === 'medecin' || $role === 'medecin_chef') {
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where('email', $email)->first();
            if (! $user || ! Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Identifiants invalides.'],
                ]);
            }

            $profile = DB::table('medecins')->where('user_id', $user->id)->first();
            if (! $profile) {
                throw ValidationException::withMessages([
                    'email' => ['Ce compte n\'est pas associé à un médecin.'],
                ]);
            }

            $isChef = $role === 'medecin_chef' && ($profile->est_chef ?? false);
            if ($role === 'medecin_chef' && ! $isChef) {
                throw ValidationException::withMessages([
                    'email' => ['Ce compte n\'est pas un médecin chef.'],
                ]);
            }

            Auth::login($user);
            session(['auth_role' => $role === 'medecin_chef' ? 'medecin_chef' : 'medecin']);

            return redirect()->intended('/');
        }

        // --- AUTHENTIFICATION SECRÉTAIRE ---
        if ($role === 'secretaire') {
            $email = $request->input('email');
            $matricule = $request->input('matricule');

            // 1. Récupération de l'utilisateur par son adresse email
            $user = User::where('email', $email)->first();
            if (! $user) {
                throw ValidationException::withMessages([
                    'email' => ['Identifiants invalides.'],
                ]);
            }

            // 2. Vérification uniquement du matricule associé à l'ID utilisateur
            $profile = DB::table('secretaires')
                ->where('user_id', $user->id)
                ->where('matricule', $matricule)
                ->first();

            if (! $profile) {
                throw ValidationException::withMessages([
                    'matricule' => ['Le numéro de matricule ne correspond pas à ce compte secrétaire.'],
                ]);
            }

            // Connecte directement l'utilisateur trouvé
            Auth::login($user);
            session(['auth_role' => 'secretaire']);
<<<<<<< HEAD
            
            // Redirection vers l'espace de secrétariat
=======
>>>>>>> 1f1e26a7f3a5c11534869a78dd2b520c1af419c2
            return redirect()->route('secretaire');
        }
        // --- AUTHENTIFICATION PATIENT ---
        if ($role === 'patient') {
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $code = $request->input('code');

            // 1. Recherche du profil patient existant
            $profile = DB::table('patients')
                ->where('nom', $nom)
                ->where('prenom', $prenom)
                ->where('code', $code)
                ->first();

            if (! $profile) {
                throw ValidationException::withMessages([
                    'code' => ['Informations de patient invalides.'],
                ]);
            }

            // 2. Vérification ou création de son compte utilisateur (User)
            $user = $profile->user_id ? User::find($profile->user_id) : null;
            
            if (!$user) {
                // Crée un utilisateur s'il n'existe pas encore
                $user = User::firstOrCreate(
                    ['email' => 'patient-' . Str::slug($nom . '-' . $prenom) . '@local'],
                    ['name' => $nom . ' ' . $prenom, 'password' => Hash::make('patient123')]
                );

                // 🔥 CORRECTION : On met à jour la table patients pour y inscrire le user_id manquant
                DB::table('patients')
                    ->where('id', $profile->id)
                    ->update(['user_id' => $user->id]);
            }

            // 3. Connecte l'utilisateur
            Auth::login($user);

            session(['auth_role' => 'patient']);
            return redirect()->route('patient.dashboard');
        }


        throw ValidationException::withMessages([
            'role' => ['Rôle invalide.'],
        ]);
    }
}
