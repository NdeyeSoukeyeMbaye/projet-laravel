@extends('layouts.app')

@section('content')

{{-- Header + navigation --}}
<x-navbar />


{{-- Contenu du dashboard --}}
<main class="max-w-7xl mx-auto px-8 py-8">

    {{-- Bonjour --}}
    <div class="mt-4 mb-8">

        <h1 class="text-4xl font-serif font-bold text-gray-900">
            Bonjour, {{ explode(' ', Auth::user()->name)[0] }} 👋
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Voici un résumé de votre espace patient.
        </p>

    </div>


    {{-- ============================== --}}
    {{-- 4 CARTES STATISTIQUES --}}
    {{-- ============================== --}}

    <div class="grid grid-cols-4 gap-6">

        <x-stat-card
            :nombre="$rdv"
            titre="RDV à venir"
            description="Prochains rendez-vous">

            <ion-icon name="calendar-outline"></ion-icon>

        </x-stat-card>


        <x-stat-card
            :nombre="$consultations"
            titre="Consultations"
            description="Consultations réalisées">

            <ion-icon name="checkmark-circle-outline"></ion-icon>

        </x-stat-card>


        <x-stat-card
            :nombre="$traitements"
            titre="Traitements"
            description="Traitements en cours">

            <ion-icon name="medkit-outline"></ion-icon>

        </x-stat-card>


        <x-stat-card
            :nombre="$medecins"
            titre="Médecins suivis"
            description="Médecins">

            <ion-icon name="people-outline"></ion-icon>

        </x-stat-card>

    </div>


    {{-- ============================== --}}
    {{-- PROCHAIN RDV + INFORMATIONS --}}
    {{-- ============================== --}}

    <div class="grid grid-cols-2 gap-6 mt-8">

        <x-prochain-rdv :prochainRdv="$prochainRdv" />

        <x-informations />

    </div>


    {{-- ============================== --}}
    {{-- CONSULTATIONS --}}
    {{-- ============================== --}}

    <div class="mt-8">

        <x-consultations />

    </div>


    {{-- ============================== --}}
    {{-- TRAITEMENTS --}}
    {{-- ============================== --}}

    <div class="mt-8">

        <x-traitements />

    </div>

</main>

@endsection