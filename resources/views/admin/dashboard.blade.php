<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administrateur</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Icônes -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-800 text-white hidden md:block">
            <!-- Logo -->
            <div class="p-6 border-b border-blue-700">
                <h1 class="text-2xl font-bold">
                    Clinique Lumière
                </h1>
                <p class="text-blue-200 text-sm mt-1">
                    Administration
                </p>
            </div>
            <!-- MENU -->
            <nav class="p-4 space-y-2">
                <a href="/admin/utilisateur"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-700">
                    <i data-lucide="users"></i>
                    <span>utilisateurs</span>
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <i data-lucide="user-round"></i>
                    <span>Patients</span>
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <i data-lucide="stethoscope"></i>
                    <span>Médecins</span>
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <i data-lucide="calendar-days"></i>
                    <span>Rendez-vous</span>
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <i data-lucide="bar-chart-3"></i>
                    <span>Statistiques</span>
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <i data-lucide="settings"></i>
                    <span>Paramètres</span>
                </a>
            </nav>
            <!-- Déconnexion -->
            <div class="absolute bottom-0 w-64 p-4">
                <a href="/"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-700 hover:bg-blue-600">
                    <i data-lucide="log-out"></i>
                    <span>Retour à l'accueil</span>
                </a>
            </div>
        </aside>
        <!-- CONTENU PRINCIPAL -->
        <main class="flex-1">
            <!-- HEADER -->
            <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Tableau de bord
                    </h2>
                    <p class="text-gray-500 text-sm">
                        Bienvenue dans votre espace administrateur
                    </p>
                    <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="font-semibold text-gray-800">
                            Administrateur
                        </p>
                        <p class="text-sm text-gray-500">
                            Gestionnaire
                        </p>
                    </div
                    <div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center">
                        <i data-lucide="user"></i>
                    </div>
                </div>
            </header>
            <!-- PAGE -->
            <section class="p-6">
                <!-- TITRE -->
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        Vue d'ensemble
                    </h3>
                    <p class="text-gray-500">
                        Voici un aperçu de l'activité de votre clinique.
                    </p>
                </div>
                <!-- CARTES STATISTIQUES -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Patients -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">
                                    Patients
                                </p>

                                <h4 class="text-3xl font-bold text-gray-800 mt-2">
                                    120
                                </h4>

                                <p class="text-green-600 text-sm mt-2">
                                    +8% ce mois
                                </p>
                            </div>

                            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                                <i data-lucide="users"></i>
                            </div>

                        </div>

                    </div>
                    <!-- Médecins -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">

                        <div class="flex justify-between items-center">

                            <div>
                                <p class="text-gray-500 text-sm">
                                    Médecins
                                </p>

                                <h4 class="text-3xl font-bold text-gray-800 mt-2">
                                    15
                                </h4>

                                <p class="text-gray-500 text-sm mt-2">
                                    Personnel médical
                                </p>
                            </div>

                            <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                                <i data-lucide="stethoscope"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Rendez-vous -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">
                                    Rendez-vous
                                </p>
                                <h4 class="text-3xl font-bold text-gray-800 mt-2">
                                    32
                                </h4>
                                <p class="text-gray-500 text-sm mt-2">
                                    Aujourd'hui
                                </p>
                            </div>
                            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                                <i data-lucide="calendar-days"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Utilisateurs -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">
                                    Utilisateurs
                                </p>
                                <h4 class="text-3xl font-bold text-gray-800 mt-2">
                                    156
                                </h4>
                                <p class="text-gray-500 text-sm mt-2">
                                    Comptes actifs
                                </p>
                            </div>
                            <div class="bg-purple-100 text-purple-600 p-3 rounded-lg">
                                <i data-lucide="user-round-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DEUX COLONNES -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- RENDEZ-VOUS RECENTS -->
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="font-bold text-lg text-gray-800">
                                Rendez-vous récents
                            </h3>
                            <a href="#"
                               class="text-blue-600 text-sm hover:underline">
                                Voir tout
                            </a>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-gray-800">
                                        Aminata Ndiaye
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Dr. Diop
                                    </p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                    Confirmé
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-gray-800">
                                        Fatou Fall
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Dr. Ba
                                    </p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                    En attente
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-gray-800">
                                        Mariama Sow
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Dr. Ndiaye
                                    </p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                    Confirmé
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- ACTIVITE -->
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b">
                            <h3 class="font-bold text-lg text-gray-800">
                                Activité récente
                            </h3>
                        </div>
                        <div class="p-6 space-y-5">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="user-plus"></i>
                                </div>

                                <div>
                                    <p class="font-medium text-gray-800">
                                        Nouveau patient enregistré
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Il y a 10 minutes
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="calendar-check"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">
                                        Rendez-vous confirmé
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Il y a 30 minutes
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="user-cog"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">
                                        Nouveau médecin ajouté
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Il y a 1 heure
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
                </div>
                
                <!-- Profil -->
                
    <!-- Activation des icônes -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>