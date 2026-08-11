<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Secrétariat</title>
    <!-- Chargement de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- 1. BARRE LATÉRALE (SIDEBAR) -->
        <aside class="w-64 bg-blue-900 text-white flex flex-col shadow-xl">
            <!-- Logo / Titre -->
            <div class="p-5 text-xl font-bold border-b border-blue-800 tracking-wider">
                🏥 MédiGestion
            </div>
            
            <!-- Liens de Navigation -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="#" class="flex items-center space-x-3 bg-blue-800 p-3 rounded-lg text-white font-medium">
                    <span>📊</span> <span>Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-blue-100 hover:bg-blue-800 hover:text-white transition">
                    <span>👥</span> <span>Gestion Patients</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-blue-100 hover:bg-blue-800 hover:text-white transition">
                    <span>📅</span> <span>Rendez-vous</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-blue-100 hover:bg-blue-800 hover:text-white transition">
                    <span>📁</span> <span>Dossiers Médicaux</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-blue-100 hover:bg-blue-800 hover:text-white transition">
                    <span>📈</span> <span>Bilans & Rapports</span>
                </a>
            </nav>

            <!-- Déconnexion -->
            <div class="p-4 border-t border-blue-800">
                <button class="w-full bg-red-600 hover:bg-red-700 p-2.5 rounded-lg text-sm font-medium transition">
                    Déconnexion
                </button>
            </div>
        </aside>

        <!-- CONTENU PRINCIPAL -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- 2. BARRE SUPÉRIEURE (NAVBAR) -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 border-b border-gray-200">
                <h1 class="text-xl font-semibold text-gray-800">Espace Secrétariat</h1>
                
                <!-- Infos Utilisateur -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr($user->name ?? 'S', 0, 1)) }}
                    </div>
                    <span class="text-gray-700 font-medium">
                        Bienvenue, <span class="text-blue-700">{{ $user->name ?? 'Secrétaire' }}</span>
                    </span>
                </div>
            </header>

            <!-- 3. ZONE DE CONTENU CENTRAL (SCROLLABLE) -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
                
                <!-- En-tête de bienvenue -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Tableau de bord</h2>
                    <p class="text-gray-500 mt-1">Sélectionnez une action ou consultez le résumé des activités ci-dessous.</p>
                </div>
                <!-- Carte 1: Patients -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
                        <div class="text-3xl mb-3">👤</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Patients & Comptes</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                      Créer des comptes patients, insérer les constantes (poids, taille, etc.) et modifier leurs informations.
                        </p>
                        <a href="{{ url('/patientcompte') }}" class="mt-4 inline-flex text-sm font-semibold text-blue-600 hover:text-blue-800 items-center">
                            Gérer les patients &rarr;
                          </a>
                    </div>
              
                    <!-- Carte 2: Rendez-vous -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
                        <div class="text-3xl mb-3">📅</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Gestion des RDV</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Consulter, planifier, modifier les rendez-vous à venir et passés. Valider les arrivées et gérer les annulations.
                        </p>
                        <button class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center">
                            Gérer l'agenda &rarr;
                        </button>
                    </div>

                    <!-- Carte 3: Rappels -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
                        <div class="text-3xl mb-3">💬</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Rappels & Alertes</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Envoyer des notifications et des rappels automatiques ou manuels par SMS ou par email aux patients.
                        </p>
                        <button class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center">
                            Envoyer un rappel &rarr;
                        </button>
                    </div>

                    <!-- Carte 4: Dossiers Médicaux -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
                        <div class="text-3xl mb-3">📁</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Dossiers & Assurances</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Consulter les dossiers médicaux des patients et ajouter les cartes d'assurance maladie au système.
                        </p>
                        <button class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center">
                            Ouvrir les dossiers &rarr;
                        </button>
                    </div>

                    <!-- Carte 5: Bilans -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
                        <div class="text-3xl mb-3">📊</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Statistiques & Bilans</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Accéder aux rapports d'activité, consulter le bilan financier et organisationnel du jour et du mois.
                        </p>
                        <button class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center">
                            Voir les bilans &rarr;
                        </button>
                    </div>

                </div>

            </main>
        </div>
    </div>

</body>
</html>
