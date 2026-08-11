@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-8 space-y-8">

    {{-- Header --}}
    <x-navbar />

    {{-- Menu --}}

    {{-- Bonjour --}}
    <div>

        <h1 class="text-5xl font-serif font-bold">

            Bonjour, {{ explode(' ', Auth::user()->name)[0] }}

        </h1>

        <p class="text-gray-500 mt-2">

            Voici un résumé de votre espace patient.

        </p>

    </div>

    {{-- Statistiques --}}
    <div class="grid grid-cols-4 gap-6">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-8">

    <x-stat-card
        :nombre="$rdv"
        titre="RDV à venir"
        description="Prochains rendez-vous">
        <ion-icon
            name="calendar-outline"
            class="text-3xl text-blue-600">
        </ion-icon>
    </x-stat-card>

    <x-stat-card
        :nombre="$consultations"
        titre="Consultations"
        description="Consultations réalisées">
        <ion-icon
            name="checkmark-circle-outline"
            class="text-3xl text-green-600">
        </ion-icon>
    </x-stat-card>

    <x-stat-card
        :nombre="$traitements"
        titre="Traitements"
        description="Traitements en cours">
        <ion-icon
            name="medkit-outline"
            class="text-3xl text-purple-600">
        </ion-icon>
    </x-stat-card>

    <x-stat-card
        :nombre="$medecins"
        titre="Médecins suivis"
        description="Médecins">
        <ion-icon
            name="people-outline"
            class="text-3xl text-orange-600">
        </ion-icon>
    </x-stat-card>

</div>

    </div>

    {{-- Deux blocs --}}
    <div class="grid grid-cols-2 gap-6">

        <x-prochain-rdv />

        <x-informations />

    </div>

    {{-- Consultations --}}
    <x-consultations />

    {{-- Traitements --}}
    <x-traitements />

</div>

@endsection