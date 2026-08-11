<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MédiGestion - Fiche Patient</title>
    <!-- Chargement officiel de la version Play CDN de Tailwind CSS -->
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-white font-sans antialiased text-slate-700">
    <div class="flex h-screen overflow-hidden">
        
        <!-- 1. BARRE LATÉRALE (SIDEBAR) -->
        <aside class="w-64 bg-blue-900 text-white flex flex-col border-r border-blue-800">
            <!-- Titre Principal -->
            <div class="p-5 text-base font-bold border-b border-blue-800 tracking-wide text-center">
                MédiGestion
            </div>
            <!-- Liens de Navigation -->
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="index.html" class="block text-blue-100 hover:bg-blue-800 p-2.5 rounded-lg transition text-xs font-medium">
                    Tableau de bord
                </a>
                <a href="patientcompte.html" class="block bg-blue-800 p-2.5 rounded-lg text-white text-xs font-semibold">
                    Gestion Patients
                </a>
                <a href="#" class="block text-blue-100 hover:bg-blue-800 p-2.5 rounded-lg transition text-xs font-medium">
                    Rendez-vous
                </a>
                <a href="#" class="block text-blue-100 hover:bg-blue-800 p-2.5 rounded-lg transition text-xs font-medium">
                    Dossiers Médicaux
                </a>
            </nav>
            <!-- Déconnexion -->
            <div class="p-4 border-t border-blue-800">
                <button class="w-full bg-transparent hover:bg-red-700 text-blue-200 hover:text-white p-2 rounded-lg text-xs font-medium transition border border-blue-800 hover:border-red-700">
                    Déconnexion
                </button>
            </div>
        </aside>

        <!-- CONTENU PRINCIPAL -->
        <div class="flex-1 flex flex-col overflow-hidden bg-white">
            
            <!-- 2. BARRE SUPÉRIEURE (NAVBAR) -->
            <header class="bg-white h-14 flex items-center justify-between px-6 border-b border-slate-200 shadow-sm">
                <div class="flex items-center space-x-3">
                    <a href="index.html" class="text-slate-400 hover:text-blue-600 text-xs font-medium transition">
                        &larr; Retour
                    </a>
                    <span class="text-slate-200">|</span>
                    <h1 class="text-sm font-bold text-slate-800">Comptes & Fiches Patients</h1>
                </div>
                <!-- Infos Utilisateur -->
                <div class="flex items-center space-x-3">
                    <div class="w-7 h-7 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-[10px]">
                        {{ strtoupper(substr($user->name ?? 'S', 0, 1)) }}
                    </div>
                    <span class="text-xs font-medium text-slate-500">
                        Secrétariat : <span class="text-blue-600 font-semibold">{{ $user->name ?? 'Secrétaire' }}</span>
                    </span>
                </div>
            </header>

            <!-- 3. ZONE DE CONTENU CENTRAL (SCROLLABLE) -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 space-y-6 bg-slate-50/30">
                
                <!-- ZONE DE RECHERCHE PRINCIPALE -->
                <div class="bg-white p-5 rounded-xl border border-slate-200">
                    <form action="#" method="GET" class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xs font-bold text-slate-800 uppercase tracking-wide">Rechercher un patient</h2>
                            <p class="text-[11px] text-slate-400 mt-0.5">Entrez les critères pour charger ou modifier une fiche.</p>
                        </div>
                        <div class="flex gap-2 w-full md:w-auto">
                            <input type="text" name="search" placeholder="Nom, prénom ou téléphone..." class="w-full md:w-72 text-sm border border-slate-200 rounded-lg px-3 py-2 focus:border-blue-500 focus:outline-none transition bg-white text-slate-700">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-semibold transition whitespace-nowrap">
                                Rechercher
                            </button>
                        </div>
                    </form>
                </div>

                <!-- FORMULAIRE 1 : MODIFICATION -->
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                    <div class="px-5 py-3 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                        <div>
                            <h2 class="text-xs font-bold text-slate-800 uppercase tracking-wide">
                                Modifier la fiche : Jean Dupont
                            </h2>
                            <p class="text-[10px] text-slate-400 mt-0.5">ID Dossier : #PT-84920</p>
                        </div>
                        <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded-full border border-blue-100">Fiche active</span>
                    </div>

                    <form action="#" method="POST" class="p-5 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nom</label>
                                <input type="text" value="Dupont" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs bg-slate-50 text-slate-400 cursor-not-allowed focus:outline-none" readonly>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Prénom</label>
                                <input type="text" value="Jean" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs bg-slate-50 text-slate-400 cursor-not-allowed focus:outline-none" readonly>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">N° Téléphone</label>
                                <input type="tel" value="0612345678" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:border-blue-500 focus:outline-none transition bg-white text-slate-700">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-t border-slate-100 pt-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Poids actuel (kg)</label>
                                <input type="number" step="0.1" value="78.5" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:border-blue-500 focus:outline-none transition bg-white text-slate-700">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Taille (cm)</label>
                                <input type="number" value="180" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:border-blue-500 focus:outline-none transition bg-white text-slate-700">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Statut Dossier</label>
                                <select class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:border-blue-500 focus:outline-none transition bg-white text-slate-700">
                                    <option value="active" selected>Actif</option>
                                    <option value="suspended">Archivé / Suspendu</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2 border-t border-slate-100">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-semibold transition">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>

                <!-- FORMULAIRE 2 : CRÉATION DE COMPTE -->
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                    <div class="px-5 py-3 border-b border-slate-100 bg-slate-50/50">
                        <h2 class="text-xs font-bold text-slate-800 uppercase tracking-wide">Créer une nouvelle fiche patient</h2>
                        <p class="text-[10px] text-slate-400 mt-0.5">Renseignez l'identité civile et l'état de santé initial.</p>
                    </div>

                    <form action="#" method="POST" class="p-5 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Nom *</label>
                            <!-- Les balises se ferment bien toutes ici à la fin : -->
                        <div class="flex justify-end space-x-2 border-t border-slate-100 pt-4">
                            <button type="reset" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-semibold transition">Réinitialiser</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold shadow-sm transition">Créer le profil patient</button>
                        </div>
                    </form> <!-- Ferme le formulaire de création -->
                </div> <!-- Ferme la carte blanche de création -->

            </main> <!-- Ferme la zone centrale scrollable -->
        </div> <!-- Ferme le conteneur du contenu principal -->
    </div> <!-- Ferme le flex global de l'application -->
</body> <!-- Ferme le corps du document -->
</html> <!-- Ferme la page HTML -->
