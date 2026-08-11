<div class="bg-white rounded-2xl shadow-sm p-6">

    <div class="flex items-center justify-between">

        <!-- Partie gauche -->
        <div class="flex items-center gap-4">

            <!-- Avatar -->
            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                <span class="text-blue-700 text-xl font-bold">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </span>

            </div>

            <div>

                <h2 class="text-xl font-bold text-gray-900">

                    {{ Auth::user()->name }}

                </h2>

                <p class="text-gray-500">

                    Patient • Clinique Lumière

                </p>

            </div>

        </div>

        <!-- Déconnexion -->
        <a href="#"
           class="flex items-center gap-2 text-gray-600 hover:text-red-600 transition">

            <ion-icon
                name="log-out-outline"
                class="text-xl">
            </ion-icon>

            Déconnexion

        </a>

    </div>

</div>

<!-- Barre de navigation -->
<div class="mt-6 bg-stone-100 rounded-2xl p-2">

    <div class="flex gap-2">

        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl bg-white shadow font-semibold text-gray-900">

            <ion-icon name="grid-outline"></ion-icon>

            Tableau de bord

        </a>

        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white">

            <ion-icon name="calendar-outline"></ion-icon>

            Mes rendez-vous

        </a>

        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white">

            <ion-icon name="document-text-outline"></ion-icon>

            Dossier médical

        </a>

        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white">

            <ion-icon name="time-outline"></ion-icon>

            Historique

        </a>

    </div>

</div>