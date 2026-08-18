<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">

        <h1 class="text-3xl font-bold text-blue-700 mb-2">
            Ajouter un utilisateur
        </h1>

        <p class="text-gray-500 mb-6">
            Créez un nouvel utilisateur pour la clinique.
        </p>

        {{-- Afficher les erreurs --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.utilisateurs.store') }}" method="POST">
            @csrf

            {{-- Nom --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Nom
                </label>

                <input
                    type="text"
                    name="nom"
                    value="{{ old('nom') }}"
                    placeholder="Entrez le nom"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="exemple@clinique.com"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >
            </div>

            {{-- Mot de passe --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Mot de passe
                </label>

                <input
                    type="mot_de_passe"
                    name="mot_de_passe"
                    placeholder="Entrez le mot de passe"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >
            </div>

            {{-- Rôle --}}
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Rôle
                </label>

                <select
                    name="role"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >
                    <option value="">-- Sélectionner un rôle --</option>
                    <option value="Administrateur">Administrateur</option>
                    <option value="Médecin">Médecin</option>
                    <option value="Secrétaire">Secrétaire</option>
                    <option value="Patient">Patient</option>
                </select>
            </div>

            {{-- Boutons --}}
            <div class="flex gap-4">

                <a
                    href="{{ route('admin.utilisateurs') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg"
                >
                    Ajouter l'utilisateur
                </button>

            </div>

        </form>

    </div>

</body>
</html>