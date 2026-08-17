@extends('layouts.app')

@section('content')

{{-- Header + navigation --}}
<x-navbar />


{{-- Contenu --}}
<main class="max-w-7xl mx-auto px-8 py-8">

    {{-- Titre --}}
    <div class="mb-8">

        <h1 class="text-4xl font-serif font-bold text-gray-900">
            Dossier médical
        </h1>

        <p class="text-gray-500 mt-2">
            Consultez les informations de votre dossier médical.
        </p>

    </div>


    {{-- ============================== --}}
    {{-- INFORMATIONS DU PATIENT --}}
    {{-- ============================== --}}

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

        {{-- Informations générales --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">

                    <ion-icon
                        name="person-outline"
                        class="text-2xl text-blue-600">
                    </ion-icon>

                </div>

                <div>

                    <h2 class="text-xl font-bold text-gray-900">
                        Informations générales
                    </h2>

                    <p class="text-sm text-gray-500">
                        Informations du patient
                    </p>

                </div>

            </div>


            <div class="space-y-4">

                <div class="flex justify-between border-b border-gray-100 pb-3">

                    <span class="text-gray-500">
                        Nom complet
                    </span>

                    <span class="font-semibold text-gray-900">
                        {{ $patient->user->name ?? 'Non renseigné' }}
                    </span>

                </div>


                <div class="flex justify-between border-b border-gray-100 pb-3">

                    <span class="text-gray-500">
                        Téléphone
                    </span>

                    <span class="font-semibold text-gray-900">
                        {{ $patient->telephone ?? 'Non renseigné' }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Adresse
                    </span>

                    <span class="font-semibold text-gray-900 text-right">
                        {{ $patient->adresse ?? 'Non renseignée' }}
                    </span>

                </div>

            </div>

        </div>


        {{-- Résumé médical --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-11 h-11 rounded-xl bg-green-100 flex items-center justify-center">

                    <ion-icon
                        name="medkit-outline"
                        class="text-2xl text-green-600">
                    </ion-icon>

                </div>

                <div>

                    <h2 class="text-xl font-bold text-gray-900">
                        Résumé médical
                    </h2>

                    <p class="text-sm text-gray-500">
                        Informations disponibles
                    </p>

                </div>

            </div>


            <div class="space-y-4">

                <div class="flex justify-between border-b border-gray-100 pb-3">

                    <span class="text-gray-500">
                        Nombre de dossiers
                    </span>

                    <span class="font-bold text-gray-900">
                        {{ $dossiers->count() }}
                    </span>

                </div>


                <div class="flex justify-between border-b border-gray-100 pb-3">

                    <span class="text-gray-500">
                        Dernière consultation
                    </span>

                    <span class="font-semibold text-gray-900">

                        @if($dossiers->first())

                            {{ $dossiers->first()->date_consultation?->format('d/m/Y') ?? 'Non renseignée' }}

                        @else

                            Aucune

                        @endif

                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Statut
                    </span>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                        Dossier actif

                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================== --}}
    {{-- HISTORIQUE DU DOSSIER --}}
    {{-- ============================== --}}

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

        <div class="flex items-center justify-between mb-6">

            <div>

                <h2 class="text-xl font-bold text-gray-900">
                    Historique médical
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Consultez les différentes consultations enregistrées.
                </p>

            </div>

            <div class="w-11 h-11 rounded-xl bg-purple-100 flex items-center justify-center">

                <ion-icon
                    name="document-text-outline"
                    class="text-2xl text-purple-600">
                </ion-icon>

            </div>

        </div>


        @if($dossiers->count() > 0)

            <div class="space-y-4">

                @foreach($dossiers as $dossier)

                    <div class="bg-slate-50 border border-gray-100 rounded-xl p-5">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <div class="flex items-center gap-2 mb-2">

                                    <ion-icon
                                        name="calendar-outline"
                                        class="text-blue-600 text-xl">
                                    </ion-icon>

                                    <span class="font-semibold text-gray-900">

                                        {{ $dossier->date_consultation?->format('d/m/Y') ?? 'Date non renseignée' }}

                                    </span>

                                </div>


                                <h3 class="font-semibold text-gray-800 mb-1">
                                    Diagnostic
                                </h3>

                                <p class="text-gray-600">

                                    {{ $dossier->diagnostic ?? 'Aucun diagnostic renseigné.' }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-10">

                <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-4">

                    <ion-icon
                        name="document-outline"
                        class="text-3xl text-gray-400">
                    </ion-icon>

                </div>

                <h3 class="text-lg font-semibold text-gray-700">
                    Aucun dossier médical
                </h3>

                <p class="text-gray-500 mt-1">
                    Aucun dossier médical n'est actuellement enregistré.
                </p>

            </div>

        @endif

    </div>

</main>

@endsection