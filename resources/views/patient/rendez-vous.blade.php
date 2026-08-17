@extends('layouts.app')

@section('content')

{{-- ============================= --}}
{{-- HEADER + NAVIGATION --}}
{{-- ============================= --}}

<x-navbar />


{{-- ============================= --}}
{{-- CONTENU --}}
{{-- ============================= --}}

<main class="max-w-7xl mx-auto px-8 py-10">

    {{-- Titre --}}
    <div class="mb-10">

        <h1 class="text-4xl font-serif font-bold text-gray-900">
            Mes rendez-vous
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Consultez vos rendez-vous médicaux.
        </p>

    </div>


    {{-- ============================= --}}
    {{-- RENDEZ-VOUS À VENIR --}}
    {{-- ============================= --}}

    <section>

        <h2 class="text-2xl font-serif font-bold text-gray-900 mb-5">
            À venir
        </h2>


        @if($rendezVousAVenir->isEmpty())

            {{-- Aucun rendez-vous --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-10 text-center shadow-sm">

                <div class="w-16 h-16 mx-auto rounded-full bg-blue-50 flex items-center justify-center mb-4">

                    <ion-icon
                        name="calendar-outline"
                        class="text-3xl text-blue-600">
                    </ion-icon>

                </div>

                <h3 class="text-lg font-semibold text-gray-800">
                    Aucun rendez-vous à venir
                </h3>

                <p class="text-gray-500 mt-2">
                    Vous n'avez actuellement aucun rendez-vous programmé.
                </p>

            </div>

        @else

            <div class="space-y-5">

                @foreach($rendezVousAVenir as $rendezVous)

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">

                        <div class="flex items-center justify-between gap-6">

                            {{-- Partie gauche --}}
                            <div class="flex items-center gap-5">

                                {{-- Icône --}}
                                <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center">

                                    <ion-icon
                                        name="calendar-outline"
                                        class="text-3xl text-blue-600">
                                    </ion-icon>

                                </div>


                                {{-- Médecin --}}
                                <div>

                                    <h3 class="text-xl font-semibold text-gray-900">

                                        @if($rendezVous->medecin && $rendezVous->medecin->user)

                                            Dr. {{ $rendezVous->medecin->user->name }}

                                        @else

                                            Médecin non renseigné

                                        @endif

                                    </h3>


                                    <p class="text-gray-500 mt-1">

                                        @if($rendezVous->medecin && $rendezVous->medecin->specialite)

                                            {{ $rendezVous->medecin->specialite->nom }}

                                        @else

                                            Spécialité non renseignée

                                        @endif

                                        @if($rendezVous->motif)
                                            · {{ $rendezVous->motif }}
                                        @endif

                                    </p>

                                </div>

                            </div>


                            {{-- Date + heure + statut --}}
                            <div class="flex items-center gap-6">

                                <div class="text-right">

                                    <p class="text-lg font-semibold text-gray-900">

                                        {{ \Carbon\Carbon::parse($rendezVous->date)->translatedFormat('d F Y') }}

                                    </p>

                                    <p class="text-gray-500">

                                        {{ $rendezVous->heure }}

                                    </p>

                                </div>


                                <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-medium">

                                    <ion-icon name="time-outline"></ion-icon>

                                    {{ $rendezVous->statut }}

                                </span>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </section>


    {{-- ============================= --}}
    {{-- RENDEZ-VOUS PASSÉS --}}
    {{-- ============================= --}}

    <section class="mt-12">

        <h2 class="text-2xl font-serif font-bold text-gray-900 mb-5">
            Rendez-vous passés
        </h2>


        @if($rendezVousPasses->isEmpty())

            <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center shadow-sm">

                <p class="text-gray-500">
                    Aucun rendez-vous passé.
                </p>

            </div>

        @else

            <div class="space-y-5">

                @foreach($rendezVousPasses as $rendezVous)

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-xl bg-gray-100 flex items-center justify-center">

                                    <ion-icon
                                        name="calendar-outline"
                                        class="text-2xl text-gray-500">
                                    </ion-icon>

                                </div>

                                <div>

                                    <h3 class="font-semibold text-gray-900">

                                        @if($rendezVous->medecin && $rendezVous->medecin->user)

                                            Dr. {{ $rendezVous->medecin->user->name }}

                                        @else

                                            Médecin non renseigné

                                        @endif

                                    </h3>

                                    <p class="text-gray-500">

                                        {{ $rendezVous->motif ?? 'Aucun motif renseigné' }}

                                    </p>

                                </div>

                            </div>


                            <div class="text-right">

                                <p class="font-medium text-gray-700">

                                    {{ \Carbon\Carbon::parse($rendezVous->date)->translatedFormat('d F Y') }}

                                </p>

                                <p class="text-gray-500">

                                    {{ $rendezVous->heure }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </section>

</main>

@endsection
