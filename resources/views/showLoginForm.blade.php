<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système Hospitalier</title>
    <!-- Script Tailwind CSS pour le rendu visuel -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen flex items-center justify-center p-4">

    <!-- Carte de connexion blanche avec ombre douce et bordure bleue subtile -->
    <div class="bg-white p-8 rounded-2xl shadow-xl shadow-blue-100/50 w-full max-w-md border border-blue-100/80">
        
        <!-- Section En-tête Dynamique -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-50 rounded-xl mb-3 text-blue-600">
                <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <!-- Affiche automatiquement le titre : Espace Medecin, Espace Secretaire... -->
            <h2 class="text-2xl font-bold text-gray-800 capitalize">
                Espace {{ str_replace('_', ' ', request('role', 'Connexion')) }}
            </h2>
            <p class="text-sm text-gray-400 mt-1">Veuillez renseigner vos accès pour continuer</p>
        </div>
        
        <!-- Affichage des erreurs de connexion Laravel -->
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-xl text-sm mb-5 border border-red-100 flex items-center gap-2">
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Formulaire principal -->
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Champ masqué qui transmet automatiquement le rôle reçu à votre contrôleur -->
            <input type="hidden" name="role" value="{{ request('role') }}">

            <!-- CAS 1 : MÉDECIN ou MÉDECIN CHEF -> Email + Mot de passe -->
            @if(request('role') === 'medecin' || request('role') === 'medecin_chef')
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1.5">Adresse Email</label>
                    <input type="email" name="email" required placeholder="medecin@hopital.com"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1.5">Mot de passe</label>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                </div>
            @endif

            <!-- CAS 2 : SECRÉTAIRE -> Email + Matricule -->
            @if(request('role') === 'secretaire')
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1.5">Adresse Email</label>
                    <input type="email" name="email" required placeholder="secretaire@hopital.com"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1.5">Numéro de Matricule</label>
                    <input type="text" name="matricule" required placeholder="Ex: SEC-2026"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                </div>
            @endif

            <!-- CAS 3 : PATIENT -> Nom + Prénom + Code -->
            @if(request('role') === 'patient')
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5">Nom</label>
                        <input type="text" name="nom" required placeholder="Votre nom"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5">Prénom</label>
                        <input type="text" name="prenom" required placeholder="Votre prénom"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1.5">Code Unique Patient</label>
                    <input type="text" name="code" required placeholder="Entrez votre code secret"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-gray-700">
                </div>
            @endif

            <!-- Bouton de validation Bleu conforme à vos boutons originaux -->
            <button type="submit" 
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 transform active:scale-[0.98] shadow-lg shadow-blue-600/20 hover:shadow-blue-600/30 text-sm tracking-wide">
                Se connecter
            </button>

            <!-- Lien de retour vers l'accueil général -->
            <div class="text-center pt-2">
                <a href="/" class="text-xs text-blue-600 hover:text-blue-700 font-medium hover:underline">← Choisir un autre profil</a>
            </div>
        </form>
    </div>

</body>
</html>
