<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs - Clinique Lumière</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen p-8">

        <h1 class="text-3xl font-bold text-blue-700 mb-2">
            Gestion des utilisateurs
        </h1>
        <p class="text-gray-600 mb-8">
            Consultez et gérez les utilisateurs de la clinique.
        </p>
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">
                    Liste des utilisateurs
                </h2>
                <a href="{{ route('admin.utilisateurs.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded">
    + Ajouter un utilisateur
</a>
            </div>

                <table class="w-full text-left">
    <thead>
        <tr>
            <th class="p-3">Nom</th>
            <th class="p-3">Prenom</th>
            <th class="p-3">Email</th>
            <th class="p-3">Rôle</th>
            <th class="p-3">Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($utilisateurs as $utilisateur)
        <tr class="border-b">
            <td class="p-3">{{ $utilisateur->nom }}</td>
            <td class="p-3">{{ $utilisateur->prenom }}</td>
            <td class="p-3">{{ $utilisateur->email }}</td>
            <td class="p-3">{{ $utilisateur->role }}</td>
            <td class="p-3">
                <button class="text-blue-600">
                    Modifier
                </button>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
        </div>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-block mt-6 bg-gray-700 text-white px-5 py-2 rounded-lg">
            ← Retour au tableau de bord
        </a>
    </div>
</body>
</html>