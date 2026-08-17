{{-- ============================== --}}
{{-- HEADER --}}
{{-- ============================== --}}

<header class="w-full bg-white border-b border-gray-200 shadow-sm">

    <div class="px-8 py-5 flex items-center justify-between">

        {{-- Partie gauche --}}
        <div class="flex items-center gap-4">

            {{-- Avatar --}}
            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                <span class="text-blue-700 text-xl font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>

            </div>


            {{-- Informations --}}
            <div>

                <h2 class="text-xl font-bold text-gray-900">
                    {{ Auth::user()->name }}
                </h2>

                <p class="text-gray-500">
                    Patient
                </p>

            </div>

        </div>


        {{-- Déconnexion --}}
        <a href="{{ route('logout') }}"
           class="flex items-center gap-2 text-gray-600 hover:text-red-600 transition">

            <ion-icon
                name="log-out-outline"
                class="text-xl">
            </ion-icon>

            Déconnexion

        </a>

    </div>

</header>


{{-- ============================== --}}
{{-- NAVIGATION --}}
{{-- ============================== --}}

<div class="max-w-7xl mx-auto px-8 pt-6">

    <nav class="bg-[#eee9e1] rounded-2xl p-2 flex items-center justify-center gap-1">


        {{-- Tableau de bord --}}
        <a href="{{ route('patient.dashboard') }}"
           class="flex items-center gap-2 px-6 py-3 rounded-xl transition
           {{ request()->routeIs('patient.dashboard')
                ? 'bg-white shadow-sm font-semibold text-gray-900'
                : 'text-gray-600 hover:bg-white' }}">

            <ion-icon
                name="grid-outline"
                class="text-xl">
            </ion-icon>

            Tableau de bord

        </a>


        {{-- Mes rendez-vous --}}
        <a href="{{ route('patient.rendez-vous') }}"
           class="flex items-center gap-2 px-6 py-3 rounded-xl transition
           {{ request()->routeIs('patient.rendez-vous')
                ? 'bg-white shadow-sm font-semibold text-gray-900'
                : 'text-gray-600 hover:bg-white' }}">

            <ion-icon
                name="calendar-outline"
                class="text-xl">
            </ion-icon>

            Mes rendez-vous

        </a>


        {{-- Dossier médical --}}
        <a href="{{ route('patient.dossier-medical') }}"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white transition
            {{ request()->routeIs('patient.dossier-medical')
            ? 'bg-white shadow-sm font-semibold text-gray-900'
            : 'text-gray-600 hover:bg-white/70' }}">
            <ion-icon
                name="document-text-outline"
                class="text-xl">
            </ion-icon>

            Dossier médical

        </a>


        {{-- Historique --}}
        <a href="{{ route('patient.historique') }}"
           class="flex items-center gap-2 px-6 py-3 rounded-xl text-gray-600 hover:bg-white transition
            {{ request()->routeIs('patient.historique')
            ? 'bg-white shadow-sm font-semibold text-gray-900'
            : 'text-gray-600 hover:bg-white/70' }}">
            <ion-icon
                name="time-outline"
                class="text-xl">
            </ion-icon>

            Historique

        </a>

    </nav>

</div>