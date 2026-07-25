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
            Choisissez votre profil pour continuer
        </p>

        <!-- Grille responsive : 1 col sur mobile, 2 col sur tablette, 3 col sur écran large -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-11/12">
            @foreach($profils as $profil)
                <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-2xl transition">
                    <h2 class="text-2xl font-bold text-blue-700">
                        {{ $profil['nom'] }}
                    </h2>
                    <p class="text-gray-600 mt-3">
                        {{ $profil['description'] }}
                    </p>
                    <a href="{{ $profil['route'] }}" 
                       class="mt-5 inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-800">
                        Accéder
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</body>
</html>