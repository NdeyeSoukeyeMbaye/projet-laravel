{{-- ============================= --}}
{{-- HEADER --}}
{{-- ============================= --}}

<div class="w-full bg-white border-b border-gray-200 shadow-sm">

    <div class="w-full px-8 py-5">

        <div class="flex items-center justify-between">

            {{-- Partie gauche --}}
            <div class="flex items-center gap-5">

                {{-- Avatar --}}
                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">

                    <span class="text-blue-700 text-2xl font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>

                </div>

                {{-- Informations patient --}}
                <div>

                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ Auth::user()->name }}
                    </h2>

                    <p class="text-lg text-gray-500 mt-1">
                        Patient
                    </p>

                </div>

            </div>


            {{-- Déconnexion --}}
            <a href="{{ url('/') }}"
               class="flex items-center gap-2 text-gray-600 hover:text-red-600 transition">

                <ion-icon
                    name="log-out-outline"
                    class="text-2xl">
                </ion-icon>

                <span>
                    Déconnexion
                </span>

            </a>

        </div>

    </div>

</div>


{{-- ============================= --}}
{{-- NAVIGATION --}}
{{-- ============================= --}}

<div class="w-full bg-[#f7f5f1] py-4">

    <nav class="flex items-center justify-center gap-2">

        {{-- Tableau de bord --}}
        <a href="{{ route('patient.dashboard') }}"
           class="flex items-center gap-2 px-6 py-3 rounded-xl bg-white shadow-sm font-semibold text-gray-900">

            <ion-icon
                name="grid-outline"
                class="text-xl">
            </ion-icon>

            <span>
                Tableau de bord
            </span>

        </a>


        {{-- Mes rendez-vous --}}
        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white transition">

            <ion-icon
                name="calendar-outline"
                class="text-xl">
            </ion-icon>

            <span>
                Mes rendez-vous
            </span>

        </a>


        {{-- Dossier médical --}}
        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white transition">

            <ion-icon
                name="document-text-outline"
                class="text-xl">
            </ion-icon>

            <span>
                Dossier médical
            </span>

        </a>


        {{-- Historique --}}
        <a href="#"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white transition">

            <ion-icon
                name="time-outline"
                class="text-xl">
            </ion-icon>

            <span>
                Historique
            </span>

        </a>

    </nav>

</div>