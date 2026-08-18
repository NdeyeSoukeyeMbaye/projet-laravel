<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Gestion des Rendez-vous</title>
    <!-- Tailwind CSS pour le style complet du formulaire -->
    <script src="https://jsdelivr.net"></script>
    <!-- Alpine.js pour la logique dynamique du formulaire -->
    <script defer src="https://jsdelivr.net"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

    <!-- resources/views/agenda.blade.php -->
    <div class="container mx-auto p-6" x-data="{ mode: 'create', rdvId: null }">
        
        <!-- En-tête dynamique -->
        <h1 class="text-2xl font-bold mb-6 text-gray-800" x-text="mode === 'create' ? 'Planifier un Rendez-vous' : 'Modifier le Rendez-vous'"></h1>

        <!-- Formulaire Principal -->
        <form :action="mode === 'create' ? '{{ route('agenda.store') }}' : '/agenda/' + rdvId" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-xl w-full">
            @csrf
            <!-- Directive pour la modification -->
            <template x-if="mode === 'edit'">
                @method('PUT')
            </template>

            <!-- Informations Patient / Client -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Date et Heure -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2" for="date">Date</label>
                    <input type="date" id="date" name="date" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2" for="heure">Heure</label>
                    <input type="time" id="heure" name="heure" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Statut du Rendez-vous (Masqué en création, visible en modification) -->
            <div class="mb-6" x-show="mode === 'edit'">
                <label class="block text-gray-700 font-semibold mb-2" for="statut">Statut actuel</label>
                <select id="statut" name="statut" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100">
                    <option value="planifie">Planifié</option>
                    <option value="arrive">Arrivé / Validé</option>
                    <option value="annule">Annulé</option>
                </select>
            </div>

            <!-- Boutons d'actions principaux -->
            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 font-medium cursor-pointer transition">
                    <span x-text="mode === 'create' ? 'Enregistrer le RDV' : 'Mettre à jour'"></span>
                </button>
                
                <button type="button" x-show="mode === 'edit'" @click="mode = 'create'; rdvId = null; $el.closest('form').reset()" class="text-gray-600 hover:underline text-sm cursor-pointer">
                    Annuler la modification
                </button>
            </div>
        </form>

        <!-- Actions Rapides (Validation Arrivée & Annulation) -->
        <div x-show="mode === 'edit'" class="mt-6 p-4 bg-gray-50 rounded-lg max-w-xl border border-gray-200 w-full" x-transition>
            <h3 class="text-sm font-semibold text-gray-700 mb-3">Actions rapides pour ce RDV :</h3>
            <div class="flex gap-4">
                <!-- Valider l'arrivée -->
                <form :action="'/agenda/' + rdvId + '/valider'" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="bg-green-600 text-white px-3 py-1.5 rounded text-sm font-medium hover:bg-green-700 cursor-pointer transition">
                        ✓ Valider l'arrivée
                    </button>
                </form>

                <!-- Gérer l'annulation -->
                <form :action="'/agenda/' + rdvId + '/annuler'" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1.5 rounded text-sm font-medium hover:bg-red-700 cursor-pointer transition">
                        ✕ Annuler le RDV
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
