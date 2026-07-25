<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous Médicaux</title>
    <!-- Chargement de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        
        <!-- Titre principal -->
        <h1 class="text-4xl font-bold text-blue-700 mb-2">
            Gestion des Rendez-vous Médicaux
        </h1>
        <p class="text-gray-600 mb-10">
            Bienvenue, {{ $user->name }}
        </p>

        <!-- Contenu spécifique pour le secrétaire -->
        <div class="bg-white shadow-lg rounded-xl p-6 w-11/12">
            <h2 class="text-2xl font-bold text-blue-700 mb-4">
                Gestion des Rendez-vous
            </h2>
            <p class="text-gray-600">
                Vous créer le compte des patient et inserer leur informations(poids, taille, etc. ).
            </p>
             <p class="text-gray-600">
                Vous pouvez consulter, créer et modifier les rendez-vous ici.
            </p>
        </div>

    </div>
</body>
</html>